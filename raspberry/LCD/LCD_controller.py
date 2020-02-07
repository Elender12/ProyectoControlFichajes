
import fingerprint_module.check_finger as cf
from . import LCD_display as lcdd

class GUI_controller():

    def __init__(self):
        self.display = lcdd.LCDDisplay(self)
        self.check = None
        self.finger_status = ''


    def finger_print_check_init(self):
        self.check = cf.FPModule_check(self)
        self.check.check_finger()

    def initialize_loop(self):
        self.display.loop()

    def set_finger_status(self, txt):
        self.finger_status = txt

    def get_finer_status(self):
        return self.finger_status
    

    