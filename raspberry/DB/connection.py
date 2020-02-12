import mysql.connector


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
        #_SQL = """SHOW tables"""
        # self.cursor.execute(_SQL)
        #res = self.cursor.fetchall()
        # print(res)

    def new_user(self, employee):
        _SQL = """INSERT INTO users (employeeDni, employeeName, employeePsw, contractType, fingerprint, bossEmail, isAdmin, contractStartDate) VALUES (%s, %s, %s, %s, %s, %s, %s, CURDATE())"""
        self.cursor.execute(_SQL, (employee.dni, employee.name, employee.password,
                                   employee.contract, employee.fingerprint, employee.bossmail, employee.rol))
        self.conn.commit()
        self.close_connection()

    def user_exist(self, employee):
        _SQL = """SELECT employeeDni from users WHERE employeeDni LIKE %s """
        self.cursor.execute(_SQL, (employee.dni, ))
        if self.cursor.fetchone() != None:
            self.close_connection()
            return True
        else:
            self.close_connection()
            return False

    def close_connection(self):
        self.cursor.close()
        self.conn.close()

#conecc = SQLConnect()
