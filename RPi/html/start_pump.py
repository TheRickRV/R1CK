import serial
import sys
import time
ser = serial.Serial('/dev/ttyUSB0', 9600)

time.sleep(5)

ser.write(b'b')

file = open("water_level.txt", "r")
waterLvl = int(file.read())
waterLvl = waterLvl-1
file.close()
    
file = open("water_level.txt", "w")
file.write(str(waterLvl))
file.close()
    
sys.exit()



