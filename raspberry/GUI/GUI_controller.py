import tkinter as tk
import model.employee as emp
import threading
import re

from . import finger_view as fv
from . import error_popup as ep
import fingerprint_module.enroll_worker as ew

class GUI_controller():

    def __init__(self):
        self.finger_position = -1
        self.employee = None

    def finger_print_thread(self):
        self.enroll = ew.FPModule(self)
        self.enroll.enroll_worker()

    def create_error_frame(self, text):
        error_window = tk.Tk()
        error_window.title("ERROR")
        error_window.geometry('400x250+400+300')
        error = ep.Error(error_window, text)
        error.pack()
        error_window.mainloop()

    def validateDNI(self, dni):
        table = "TRWAGMYFPDXBNJZSQVHLCKE"
        dig_ext = "XYZ"
        replace_dig_ext = {'X':'0', 'Y':'1', 'Z':'2'}
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
                and table[int(dni)%23] == dig_control
        return False

    def validateEmail(self, email):

        '''Regular Expresion explanation:
        ^ = Start string
        \w = word and number characters
        \. = any character
        +, ?, * = repetition qualifiers

        For more details:
        https://docs.python.org/3/library/re.html

        '''
        regex = r'^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$'
        
        if(re.search(regex,email)):
            return True 
          
        else:  
            return False


    def create_employee(self, user_form):

        dni = user_form.dni_TF.get()
        name = user_form.name_TF.get()
        paswsd = user_form.passwd_TF.get()
        bossmail = user_form.bossmail_TF.get()
        contract = user_form.contract_combo.get()
        rol = user_form.rol_combo.get()

        if dni == '' or name == '' or paswsd == '' or bossmail == '':
            self.create_error_frame('Empty field')
        
        elif not self.validateDNI(dni):
            self.create_error_frame('Invalid DNI')

        elif not self.validateDNI(dni):
            self.create_error_frame('Invalid Email')

        #elif user_form.dni_TF.get() == dni on DB:
            #ERROR

        else:
            self.employee = emp.Employee(name, dni, paswsd, contract, bossmail, rol)
            
            self.view = fv.FPView(user_form.parent)
            user_form.destroy()
            self.view.pack()

            FPthread = threading.Thread(target=self.finger_print_thread)
            FPthread.start()

            if self.finger_position != -1:
                self.employee.fingerprint = self.finger_position
                
                
                #if DB doesnt work: delete template from device and ERROR
                #else: #new Employee on DB

            else:
                self.create_error_frame("Can't create Employee")

    
    
        