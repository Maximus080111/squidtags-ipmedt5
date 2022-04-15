from functions import *
from datetime import timedelta, datetime
from time import sleep
import mysql.connector
from mysql.connector import Error
from serial import Serial
from pynput.keyboard import Key, Controller
import string
import time

# hier komt de database code te staan, dit verbind je met de database van gerben

try:
    connection = mysql.connector.connect(
        host="gerrietech.com",
        user="ipmedt5",
        passwd="*1g5HMjrFDSYA6/5",
        database="ipmedt5",
    )

# met deze code vangt hij errors op en zegt hij tegen je als je bent uitgelogd
except Error as e:
    print("Error while connecting to MySQL", e)
    connected = False
    while not connected:
        try:
            connection = mysql.connector.connect(
                host="gerrietech.com",
                user="ipmedt5",
                passwd="*1g5HMjrFDSYA6/5",
                database="ipmedt5",
            )
            if connection.is_connected:
                connected = True
        except Error as e1:
            print("Error while connecting to MySQL", e, " Trying again in 10 seconds...")
            sleep(10)

port = Serial("/dev/ttyACM0", baudrate=9600, timeout=1.0)
port2 = Serial("/dev/ttyUSB0", baudrate=9600, timeout=1.0)

while True:
    rcv = port.readline().decode('utf-8').strip()
    rcv2 = port2.readline().decode('utf-8').strip()
    # rcv = input("Geef rfid code op!")
    print(rcv2)
    #rfid-checkin.rfid-data.shopID
    if "rfid-checkin" in rcv2:
        
        rfid = rcv2.split(".")[1][1:-1] + rcv2.split(".")[1][-1]
        print(rfid)
        shopID = rcv2.split(".")[2]
        owner = ownerID(rfid)
        if(owner == None):
            print("Tag not linked!")
            continue
            Serial.write("Tag not linked!").encode("utf-8")
        #als persoon al in wachtrij zit uitchecken
        elif(wachtrijExists(shopID, ownerID(rfid))):
            print("Wachtrij bestaat al!")
            print(wachtrijPhysical(shopID, ownerID(rfid)))
            if wachtrijPhysical(shopID, ownerID(rfid)):
                removeWachtrij(shopID, ownerID(rfid))
            elif not wachtrijPhysical(shopID, ownerID(rfid)):
                setWachtrijPhysical(shopID, ownerID(rfid))
        else:
            insertWachtrij(shopID, ownerID(rfid))

    if "rfid-register" in rcv:
        print(rcv.split("."))
        typeText(rcv.split(".")[1])

    connection.commit()
    
