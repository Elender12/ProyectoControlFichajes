import threading
import fingerprint_module.check_finger as cf
from . import LCD_display as lcdd
from DB import connection

class LCD_controller():

    def __init__(self):
        self.display = lcdd.LCDDisplay(self)
        self.check = cf.FPModule_check(self)
        self.finger_status = ''
        self.FPthread = None
        self.LCDthread = None



    def finger_print_check_init(self):
        self.check = cf.FPModule_check(self)
        self.check.check_finger()

    def initialize_global_loop(self):
        self.FPthread = threading.Thread(target=self.check.check_finger)
        self.LCDthread = threading.Thread(target=self.display.loop)
        self.FPthread.start()
        self.LCDthread.start()
        self.FPthread.join()
        self.LCDthread.join()
        
    def stop_loop(self):
        self.display.destroy()

    def set_finger_status(self, txt):
        self.finger_status = txt

    def get_finger_status(self):
        text = self.finger_status
        spaces = 16 - len(text)
        for _ in range(spaces):
            text = text + ' '  
        return text

    def check_finger_in_DB(self, template_position):
        DBConnection = connection.SQLConnect()
        return DBConnection.dni_from_template(template_position)

    def inser_time_in_DB(self, dni):
        DBConnection = connection.SQLConnect()
        DBConnection.new_clocking_reg(dni)
    

    