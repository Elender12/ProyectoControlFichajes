from pyfingerprint.pyfingerprint import PyFingerprint


## Deletes a finger from sensor
##


## Tries to initialize the sensor

class FPModuleDelete():

    def __init__(self, controller):
        self.controller = controller

    def delete_worker(self):
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

        ## Tries to delete the template of the finger
        try:
            positionNumber = int(self.controller.template_number)
            

            if ( f.deleteTemplate(positionNumber) == True ):
                self.controller.create_info_frame('Fingerprint Deleted')
                self.controller.remove_from_DB()
                print('Template deleted!')

        except Exception as e:
            print('Operation failed!')
            print('Exception message: ' + str(e))
            exit(1)