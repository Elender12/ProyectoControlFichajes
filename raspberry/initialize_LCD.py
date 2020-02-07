
import LCD.LCD_controller as lcdcon

if __name__ == '__main__':

    controller = lcdcon.LCD_controller()

    print ('Program is starting ... ')
    try:
        controller.initialize_loop()
    except KeyboardInterrupt:
        controller.stop_loop()
        controller.check.run = False
