import RPi.GPIO as GPIO
import time
import cgi, cgitb

GPIO.setmode(GPIO.BOARD)
GPIO.setup(11,GPIO.OUT)

file = open("/var/www/html/textfile.txt", "r")
led_state = file.read()
if led_state == "On":
	GPIO.output(11,True)
else:
	GPIO.output(11,False)
file.close()
# GPIO.cleanup() WARNING! PORTS ARE NOT CLEANED IN ORDER TO KEEP THE STATS OF LED!