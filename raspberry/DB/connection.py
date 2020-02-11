import mysql.connector

class SQLConnect():
    def __init__(self):

        #self.controller = controller
        self.dbconfig = {'host': "192.168.2.75",
                    'user': "root2",
                    'password': "root2",
                    'database': "fingerprintassistancecontrol",
                    'port': '3306',
                    }
        self.conn = mysql.connector.connect(**self.dbconfig)
        self.cursor = self.conn.cursor()
        #_SQL = """SHOW tables"""
        #self.cursor.execute(_SQL)
        #res = self.cursor.fetchall()
        #print(res)


    def find_user_by_FP(self):
        _SQL = "SHOW tables"
        return self.cursor.execute(_SQL)
        

conecc = SQLConnect()