import threading
import fingerprint_module.check_finger as cf
from . import LCD_display as lcdd

class LCD_controller():

    def __init__(self):
        self.display = lcdd.LCDDisplay(self)
        self.check = None
        self.finger_status = ''


    def finger_print_check_init(self):
        self.check = cf.FPModule_check(self)
        self.check.check_finger()

    def initialize_loop(self):
        #thread
        FPthread = threading.Thread(target=self.finger_print_check_init())
        FPthread.start()
        self.display.loop()

    def stop_loop(self):
        self.display.destroy()

    def set_finger_status(self, txt):
        self.finger_status = txt

    def get_finer_status(self):
        return self.finger_status

    def check_finger_on_DB(self, template_position):
        template_position = template_position
        #DB query
        return 'dni'
    

    