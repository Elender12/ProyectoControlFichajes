#!/usr/bin/env python
# -*- coding: utf-8 -*-

from pyfingerprint.pyfingerprint import PyFingerprint
import time

class FPModule_check():

    def __init__(self, controller):
        self.controller = controller
        self.run = True

    def check_finger(self):
        while self.run:
            ## Search for a finger

            ## Tries to initialize the sensor
            try:
                f = PyFingerprint('/dev/ttyUSB0', 57600, 0xFFFFFFFF, 0x00000000)

                if ( f.verifyPassword() == False ):
                    self.controller.set_finger_status('ERROR #')
                    raise ValueError('The given fingerprint sensor password is wrong!')

            except Exception as e:
                print('The fingerprint sensor could not be initialized!')
                self.controller.set_finger_status('ERROR #')
                print('Exception message: ' + str(e))
                exit(1)

            ## Gets some sensor information
            print('Currently used templates: ' + str(f.getTemplateCount()) +'/'+ str(f.getStorageCapacity()))

            ## Tries to search the finger
            try:
                self.controller.set_finger_status('READY')
                print('Waiting for finger...')

                ## Wait that finger is read

                while (f.readImage() == False ):
                    pass

                ## Converts read image to characteristics and stores it in charbuffer 1
                f.convertImage(0x01)

                ## Searchs template
                result = f.searchTemplate()

                positionNumber = result[0]
                accuracyScore = result[1]

                if ( positionNumber == -1 ):
                    self.controller.set_finger_status('USER NOT FOUND')
                    print('No match found!')
                    #exit(0)
                else:
                    try:
                        dni = self.controller.check_finger_in_DB(positionNumber)
                        if dni ==-1:
                            pass #error
                            self.controller.set_finger_status('NO DB RECORD')
                        else: 
                            print('Found template at position #' + str(positionNumber))
                            print('The accuracy score is: ' + str(accuracyScore))
                            self.controller.inser_time_in_DB(dni)
                            self.controller.set_finger_status(dni)
                    except:
                        self.controller.set_finger_status("NO DB CONNECTION")

                time.sleep(2.5)

            except Exception as e:
                self.controller.set_finger_status('ERROR #')
                print('Operation failed!')
                print('Exception message: ' + str(e))
                #exit(1)
                time.sleep(2.5)