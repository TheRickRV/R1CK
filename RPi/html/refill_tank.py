import time
import cgi, cgitb

file = open("/var/www/html/water_level.txt", "w")
file.write("4")
file.close()