#!/usr/bin/env python
# -*- coding: utf-8 -*-

from pyfingerprint.pyfingerprint import PyFingerprint

class FPModule_check():

    def __init__(self, controller):
        self.controller = controller

    def check_finger(self):
        
        ## Search for a finger

        ## Tries to initialize the sensor
        try:
            f = PyFingerprint('/dev/ttyUSB0', 57600, 0xFFFFFFFF, 0x00000000)

            if ( f.verifyPassword() == False ):
                raise ValueError('The given fingerprint sensor password is wrong!')

        except Exception as e:
            print('The fingerprint sensor could not be initialized!')
            print('Exception message: ' + str(e))
            exit(1)

        ## Gets some sensor information
        print('Currently used templates: ' + str(f.getTemplateCount()) +'/'+ str(f.getStorageCapacity()))

        ## Tries to search the finger
        try:
            print('Waiting for finger...')

            ## Wait that finger is read
            while ( f.readImage() == False ):
                pass

            ## Converts read image to characteristics and stores it in charbuffer 1
            f.convertImage(0x01)

            ## Searchs template
            result = f.searchTemplate()

            positionNumber = result[0]
            accuracyScore = result[1]

            if ( positionNumber == -1 ):
                print('No match found!')
                exit(0)
            else:
                print('Found template at position #' + str(positionNumber))
                print('The accuracy score is: ' + str(accuracyScore))

        except Exception as e:
            print('Operation failed!')
            print('Exception message: ' + str(e))
            exit(1)