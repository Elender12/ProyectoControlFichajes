#!/usr/bin/env python
# -*- coding: utf-8 -*-


import time
from pyfingerprint.pyfingerprint import PyFingerprint


## Enrolls new worker
## Tries to initialize the sensor

class FPModule():

    def __init__(self, controller):
        self.controller = controller

    def enroll_worker(self):
        try:
            f = PyFingerprint('/dev/ttyUSB0', 57600, 0xFFFFFFFF, 0x00000000)
            if ( f.verifyPassword() == False ):
                raise ValueError('The given fingerprint sensor password is wrong!')

        except Exception as e:
            self.controller.view.msgText1.set('ERROR')
            print('The fingerprint sensor could not be initialized!')
            print('Exception message: ' + str(e))
            exit(1)

        ## Gets some sensor information
        print('Currently used templates: ' + str(f.getTemplateCount()) +'/'+ str(f.getStorageCapacity()))

        ## Tries to enroll new finger
        try:
            self.controller.view.statusText.set('Status: OK')
            self.controller.view.msgText1.set('Waiting for finger...')
            print('Waiting for finger...')

            ## Wait that finger is read
            while ( f.readImage() == False ):
                pass

            ## Converts read image to characteristics and stores it in charbuffer 1
            f.convertImage(0x01)

            ## Checks if finger is already enrolled
            result = f.searchTemplate()
            positionNumber = result[0]

            if ( positionNumber >= 0 ):
                self.controller.view.msgText1.set('Remove finger...')
                self.controller.view.statusText.set('Status: Template already exists at position #' + str(positionNumber))
                print('Template already exists at position #' + str(positionNumber))
                exit(0)
            self.controller.view.msgText1.set('Remove finger...')
            print('Remove finger...')
            time.sleep(2)

            for _ in range(4):

                self.controller.view.msgText1.set('Waiting for same finger again...')

                print('Waiting for same finger again...')

                ## Wait that finger is read again
                while ( f.readImage() == False ):
                    pass

                ## Converts read image to characteristics and stores it in charbuffer 2
                f.convertImage(0x02)

                ## Compares the charbuffers
                if ( f.compareCharacteristics() == 0 ):
                    self.controller.view.msgText1.set('An error ocurr')
                    self.controller.view.statusText.set('Status: Fingers do not match')
                    raise Exception('Fingers do not match')

                ## Creates a template
                f.createTemplate()

                self.controller.view.msgText1.set('Remove finger...')
                print('Remove finger...')
                time.sleep(2)

            ## Saves template at new position number
            positionNumber = f.storeTemplate()

            self.controller.view.msgText1.set('Finger enrolled successfully! Pos: ' + str(positionNumber))
            self.controller.view.statusText.set('Status: Finish')
            print('Finger enrolled successfully!')
            print('New template position #' + str(positionNumber))
            self.controller.template_number = positionNumber
            self.controller.employee_to_DB()

        except Exception as e:
            print('Operation failed!')
            print('Exception message: ' + str(e))
            exit(1)