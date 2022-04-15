# from functions import *
from datetime import timedelta, datetime
from time import sleep
import mysql.connector
from mysql.connector import Error

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

while True:
    mycursor = connection.cursor()
    mycursor.execute("SELECT * FROM wachtrij")
    myresult = mycursor.fetchall()
    for x in myresult:
        mycursor.execute("SELECT * FROM registerd_shops WHERE id = "+str(x[1])+";")
        wachtTijd = int(mycursor.fetchall()[0][4])*60
        print(x[-1])
        print(x)
        if x[-2] < datetime.now()-timedelta(seconds=3600) and x[-4] == False:
            print("Older than half an hour")
            mycursor.execute("DELETE FROM wachtrij WHERE id = "+str(x[0]))
            print(str(x[0])+" has been deleted from the waiting line")
        if x[-1] < datetime.now()-timedelta(seconds=120) and x[-4] == True:
            print(str(x[0])+" Exceeds average waiting time!")
            mycursor.execute("DELETE FROM wachtrij WHERE id = "+str(x[0]))
            print(str(x[0])+" has been deleted from the waiting line")
    print("Waiting for 60 seconds...")
    connection.commit()
    sleep(1)

  
