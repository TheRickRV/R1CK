import serial
import sys
import time
ser = serial.Serial('/dev/ttyUSB0', 9600)

time.sleep(5)

ser.write(b'a')

while 1: 
    if(ser.in_waiting >0):
        line = ser.readline()
        print(line.decode('utf-8'))
        file = open("textfile.txt", "w")
        file.write(line.decode('utf-8'))
        file.close()
        sys.exit()
