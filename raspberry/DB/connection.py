import mysql.connector

class SQLConnect():
    def __init__(self, controller):

        self.controller = controller
        self.dbconfig = {'host': "192.168.2.75",
                    'user': "root",
                    'password': "",
                    'database': 'fingerprintassistancecontrol',
                    'port': '3306',
                    'unix_socket': '/run/mysqld/mysqld.sock'
                    }
        self.conn = mysql.connector.connect(**self.dbconfig)
        self.cursor = self.conn.cursor()


    def find_user_by_FP(self, template_number):
        _SQL = """SELECT employeeDni FROM users WHERE fingerprint = template_number;"""
        return self.cursor.execute(_SQL)