import mysql.connector
from model import employee


class SQLConnect():
    def __init__(self):

        self.dbconfig = {'host': "192.168.2.75",
                         'user': "root2",
                         'password': "root2",
                         'database': "fingerprintassistancecontrol",
                         'port': '3306',
                         }
        self.conn = mysql.connector.connect(**self.dbconfig)
        self.cursor = self.conn.cursor()

    def get_employee(self, dni):

        _SQL = """SELECT * from users WHERE employeeDni LIKE %s """
        self.cursor.execute(_SQL, (dni, ))

        employee_parameters = self.cursor.fetchone()
        self.close_connection()
        return employee.Employee(employee_parameters[1], employee_parameters[0], employee_parameters[2], employee_parameters[3], employee_parameters[5], employee_parameters[6])

    def new_user(self, employee):
        _SQL = """INSERT INTO users (employeeDni, employeeName, employeePsw, contractType, fingerprint, bossEmail, isAdmin, contractStartDate) VALUES (%s, %s, %s, %s, %s, %s, %s, CURDATE())"""
        self.cursor.execute(_SQL, (employee.dni, employee.name, employee.password,
                                   employee.contract, employee.fingerprint, employee.bossmail, employee.rol))
        self.conn.commit()
        self.close_connection()

    def update_user(self, employee):
        # No ha cambiado el contractEndDate a NULL
        _SQL = """UPDATE users SET contractStartDate = CURDATE(), contractEndDate = null, employeeName = %s, employeePsw = %s, contractType = %s, fingerprint = %s, bossEmail = %s, isAdmin = %s  WHERE employeeDni LIKE %s """
        self.cursor.execute(_SQL, (employee.name, employee.password, employee.contract,
                                   employee.fingerprint, employee.bossmail, employee.rol, employee.dni))
        self.conn.commit()
        self.close_connection()

    def user_exist(self, dni):
        _SQL = """SELECT employeeDni from users WHERE employeeDni LIKE %s """
        self.cursor.execute(_SQL, (dni, ))
        emp_dni = self.cursor.fetchone()
        if emp_dni == None:
            self.close_connection()
            return -1  # Employee doesn't exist
        else:
            _SQL = """SELECT fingerprint from users WHERE employeeDni LIKE %s """
            self.cursor.execute(_SQL, (dni, ))
            emp_fp = self.cursor.fetchone()[0]
            if emp_fp == -1:
                self.close_connection()
                return 0  # Former employee is hired again
            else:
                self.close_connection()
                return 1  # Employee currently working

    def template_from_dni(self, dni):
        _SQL = """SELECT fingerprint from users WHERE employeeDni LIKE %s """
        self.cursor.execute(_SQL, (dni, ))
        user_temp = self.cursor.fetchone()[0]
        if user_temp != None:
            self.close_connection()
            return user_temp
        else:
            self.close_connection()
            return -1

    def dni_from_template(self, template):
        _SQL = """SELECT employeeDni from users WHERE fingerprint LIKE %s """
        self.cursor.execute(_SQL, (template, ))
        emp_dni = self.cursor.fetchone()[0]
        if emp_dni != None:
            self.close_connection()
            return emp_dni
        else:
            self.close_connection()
            return -1

    def delete_user(self, template):
        _SQL = """UPDATE users SET contractEndDate = CURDATE(), fingerprint = -1 WHERE fingerprint = %s """
        self.cursor.execute(_SQL, (template, ))
        self.conn.commit()
        self.close_connection()

    def new_clocking_reg(self, dni):
        _SQL = """SELECT COUNT(*) FROM clokinginregisters WHERE clockingDate = CURDATE() AND dniUser = %s """
        self.cursor.execute(_SQL, (dni, ))
        entry_numbers = self.cursor.fetchone()[0]

        clockingType = ''

        if entry_numbers % 2 == 0:
            clockingType = 'entrance'
        elif entry_numbers % 2 != 0:
            clockingType = 'exit'

        _SQL = """INSERT INTO clokinginregisters (dniUser, clockingDate, clockingTime, clockingType) VALUES (%s, CURDATE(), CURTIME(), %s)"""
        self.cursor.execute(_SQL, (dni, clockingType))
        self.conn.commit()

        self.close_connection()

    def log_entry_fire_employee(self, dni):
        _SQL = """SELECT contractStartDate FROM users WHERE employeeDni = %s """
        self.cursor.execute(_SQL, (dni, ))
        user_hire_date = self.cursor.fetchone()[0]

        _SQL = """INSERT INTO loginfo (logWho, logAction) VALUES (%s, %s)"""
        # We are using the DNI of an admin already in the database
        self.cursor.execute(_SQL, ('Y4588344X', 'The employee with dni: ' + str(
            dni) + ' and hiring date: ' + str(user_hire_date) + ' has been ceased'))
        self.conn.commit()
        self.close_connection()

    def close_connection(self):
        self.cursor.close()
        self.conn.close()
