
### Create an Employee object:

class Employee():
    def __init__(self, name:str, dni:str, password:str, contract:str, bossmail:str, rol:str):
        self.name = name
        self.dni = dni
        self.password = password
        self.fingerprint = -1
        self.contract = contract
        self.admin = ''
        self.bossmail = bossmail
        self.rol = rol