import tkinter as tk
import model.employee as emp
import threading
import re
import time

from . import finger_view as fv
from . import error_popup as ep
from . import info_popup as ip
from . import initial_view as iv

from DB import connection

import fingerprint_module.enroll_worker as ew
import fingerprint_module.delete_worker as dw
import fingerprint_module.quick_delete_worker as qdw


class GUI_controller():

    def __init__(self):
        self.employee = None
        self.parent = None
        self.view = None
        self.init_view = None
        self.delete_view = None
        self.template_number = -1
        self.q_delete = qdw.FPModuleDeleteQuick(self)
        self.former_employee = False
        self.dni = ''

    def finger_print_init(self):
        self.enroll = ew.FPModule(self)
        self.enroll.enroll_worker()

    def finger_print_delete_init(self):
        self.delete = dw.FPModuleDelete(self)
        self.delete.delete_worker()

    def create_error_frame(self, text):
        error_window = tk.Tk()
        error_window.title("ERROR")
        error_window.geometry('400x250+400+300')
        error = ep.Error(error_window, text)
        error.pack()
        error_window.mainloop()

    def create_info_frame(self, text):
        info_window = tk.Tk()
        info_window.title("STATUS")
        info_window.geometry('400x250+400+300')
        info = ip.Info(info_window, text)
        info.pack()
        info_window.mainloop()

    def validateDNI(self, dni):
        table = "TRWAGMYFPDXBNJZSQVHLCKE"
        dig_ext = "XYZ"
        replace_dig_ext = {'X': '0', 'Y': '1', 'Z': '2'}
        numbers = "1234567890"
        dni = dni.upper()
        if len(dni) == 9:
            dig_control = dni[8]
            dni = dni[:8]
            if dni[0] in dig_ext:
                dni = dni.replace(dni[0], replace_dig_ext[dni[0]])

            '''use a non-declarated list tu put the n element from dni if than number is on the numbers list too.
                list[]
                for n in numbers:
                    if n % 2 == 1:
                        list.append(n * 2)'''

            return len(dni) == len([n for n in dni if n in numbers]) \
                and table[int(dni) % 23] == dig_control
        return False

    def validateEmail(self, email):

        ### Regular Expresion explanation: ###
        # ^ = Start string
        # \w = word and number characters
        # \. = any character
        # +, ?, * = repetition qualifiers

        # For more details:
        # https://docs.python.org/3/library/re.html

        regex = r'^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$'

        if(re.search(regex, email)):
            return True

        else:
            return False

    def create_employee(self, user_form):

        dni = user_form.dni_TF.get()
        name = user_form.name_TF.get()
        passwd = user_form.passwd_TF.get()
        bossmail = user_form.bossmail_TF.get()
        contract = user_form.contract_combo.get()
        rol = user_form.rol_combo.get()

        # try/except

        if dni == '' or name == '' or passwd == '' or bossmail == '':
            self.create_error_frame('Empty field')

        elif not self.validateDNI(dni):
            self.create_error_frame('Invalid DNI')

        elif not self.validateEmail(bossmail):
            self.create_error_frame('Invalid Email')

        else:
            DBconnection = connection.SQLConnect()
            check_result = DBconnection.user_exist(dni)
            if check_result == 1:
                self.create_error_frame('User already exists')
            elif check_result == 0:

                self.former_employee = True

                DBconnection = connection.SQLConnect()
                self.employee = DBconnection.get_employee(dni)

                rol_num = 0
                if rol == "Admin":
                    rol_num = 1

                self.employee.name = name
                self.employee.password = passwd
                self.employee.bossmail = bossmail
                self.employee.contract = contract
                self.employee.rol = rol_num

                DBconnection = connection.SQLConnect()
                DBconnection.update_user(self.employee)

            elif check_result == -1:
                rol_num = 0
                if rol == "Admin":
                    rol_num = 1

                self.employee = emp.Employee(
                    name, dni, passwd, contract, bossmail, rol_num)

            self.parent = user_form.parent

            self.view = fv.FPView(self.parent)
            user_form.destroy()
            self.view.pack()

            FPthread = threading.Thread(target=self.finger_print_init)
            FPthread.start()

    def employee_to_DB(self):

        if self.template_number != -1:
            try:
                if self.former_employee:
                    DBconnection = connection.SQLConnect()
                    self.employee.fingerprint = self.template_number
                    DBconnection.update_user(self.employee)

                else:
                    DBconnection = connection.SQLConnect()
                    self.employee.fingerprint = self.template_number
                    DBconnection.new_user(self.employee)

            except Exception as e:
                self.create_error_frame('Database Error/n' + str(e))

            finally:
                time.sleep(2)
                self.init_view = iv.InitialFrame(self.parent)
                self.view.destroy()
                self.init_view.pack()

        else:
            self.create_error_frame("Can't create Employee")

    def delete_employee(self, delete_view):
        self.delete_view = delete_view
        self.dni = delete_view.dni_TF.get()
        # try/except
        DBconnection = connection.SQLConnect()
        template = DBconnection.template_from_dni(self.dni)
        if template == -1:
            self.create_error_frame("The employee doesn't exist")
        else:
            self.template_number = template

        FPDeletethread = threading.Thread(target=self.finger_print_delete_init)
        FPDeletethread.start()

    def remove_from_DB(self):
        # try/except
        DBconnection = connection.SQLConnect()
        DBconnection.delete_user(self.template_number)

        DBconnection = connection.SQLConnect()
        DBconnection.log_entry_fire_employee(self.dni)

        #self.init_view = iv.InitialFrame(self.parent)
        # self.delete_view.destroy()
        # self.init_view.pack()

    def restore_initial_frame_from_delete(self):
        self.init_view = iv.InitialFrame(self.parent)
        self.delete_view.destroy()
        self.init_view.pack()
