from functions1 import *
from datetime import timedelta, datetime
from time import sleep
import mysql.connector
from mysql.connector import Error
from serial import Serial
import string
import time
import math

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

# port = Serial("/dev/ttyACM0", baudrate=9600, timeout=1.0)

while True:
    connection.commit()
    mycursor = connection.cursor()
    mycursor.execute("SELECT * FROM wachtrij")
    wachtrijData = mycursor.fetchall()
    wachtrijLibrary = {}
    for x in wachtrijData:
        wachtrijLibrary[x[0]] = "storeID:"+str(x[1])+",wachtrijID:"+str(x[0])+",physical:"+str(x[3])
    shopWachtrij = {}
    for x in wachtrijLibrary:
        split = wachtrijLibrary[x].split(",")
        storeID = split[0].split(":")[1]
        wachtrijID = split[1].split(":")[1]
        physical = split[2].split(":")[1]
        try:
            shopWachtrij[storeID] = shopWachtrij[storeID] + "," + wachtrijID
        except KeyError:
            shopWachtrij[storeID] = wachtrijID
    for x in shopWachtrij:
        mycursor.execute("SELECT MaxVisit FROM registerd_shops where id = "+x+";")
        MaxVisit = mycursor.fetchall()
        wachtrijWinkel = shopWachtrij[x].split(",")
        for i in wachtrijWinkel:
            wachtrijID = i
            print(wachtrijID)
            mycursor.execute("SELECT * FROM wachtrij where id = "+str(wachtrijID)+";")
            wachtrijData = mycursor.fetchall()[0]
            shopWachtrij[x] = shopWachtrij[x] + "-" + str(MaxVisit[0][0])
            wachtrijSplit = shopWachtrij[x].split("-")
            mycursor.execute("SELECT phoneNumber FROM users where id = "+str(wachtrijData[2])+";")
            Number = mycursor.fetchall()
            MaxVisit1 = wachtrijSplit[1]
            sms = math.ceil(int(MaxVisit1) * 1.15)
            wachtrijLength = len(wachtrijSplit[0].split(","))
            print(wachtrijData)
            if(wachtrijLength <= sms) and (wachtrijData[4] == False) and (wachtrijData[3] == True):
                #code voor sms
                print("Je bent bijna aan de beurt")
                mycursor.execute("UPDATE wachtrij set sms_send = True WHERE id = "+wachtrijID+";")
                message(str(Number),shopAdres(x))
    connection.commit()

    sleep(1)

    
