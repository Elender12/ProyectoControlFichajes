from PCF8574 import PCF8574_GPIO
from Adafruit_LCD1602 import Adafruit_CharLCD
from time import sleep, strftime
from datetime import datetime

class LCDDisplay():

    def __init__(self, controller):
        self.PCF8574_address = 0x27 # I2C address of the PCF8574 chip.
        self.PCF8574A_address = 0x3F # I2C address of the PCF8574A chip.
        self.mcp = None
        self.controller = controller
        self.run = True

        # Create PCF8574 GPIO adapter.
        try:
            self.mcp = PCF8574_GPIO(self.PCF8574_address)
        except:
            try:
                self.mcp = PCF8574_GPIO(self.PCF8574A_address)
            except:
                print ('I2C Address Error !')
                exit(1)

        # Create LCD, passing in MCP GPIO adapter.
        self.lcd = Adafruit_CharLCD(pin_rs=0, pin_e=2, pins_db=[4,5,6,7], GPIO=self.mcp)

    def get_time_now(self): # get system time
        return datetime.now().strftime(' %H:%M:%S')

    def loop(self):
        self.mcp.output(3,1) # turn on LCD backlight
        self.lcd.begin(16,2) # set number of LCD lines and columns
        
        while(self.run):
            
            self.lcd.setCursor(0,0) # set cursor position
            self.lcd.message(self.get_time_now()) # display the time
            self.lcd.setCursor(0,1) # set cursor position
            self.lcd.message(self.controller.get_finger_status())

            sleep(0.2)
        
        if self.run == True:
            self.lcd.clear()
    
    def destroy(self):
        self.run = False
        self.lcd.clear()