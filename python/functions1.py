from time import sleep
from tokenize import Ignore
import mysql.connector
from mysql.connector import Error
import math
from twilio.rest import Client
from pynput.keyboard import Key, Controller

try:
    connection = mysql.connector.connect(
        host="gerrietech.com",
        user="ipmedt5",
        passwd="*1g5HMjrFDSYA6/5",
        database="ipmedt5",
    )

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


rfidtag = 0 #hier komt tagdata te staan
user_id = 0 #hier komt de userid in te staan
shopid = 0 #id van de shop
physical = True

# In deze functie maak je een sms bericht naar de juiste persoon
def message():
    # Your Account SID from twilio.com/console
    account_sid = "ACb0cb62eebae8b410963c53d0a7bf0944"
    # Your Auth Token from twilio.com/console
    auth_token  = "6f553075a4af14eb9b91b613ef1316d2"

    client = Client(account_sid, auth_token)

    # message = client.messages.create(
    #     to="+31"+ nummer + "" , 
    #     from_="+19182654384",
    #     body="Je bent bijna aan de beurt.")

    # print(message.sid)

#returned de waarde voor degene die bijna aan de beurt zijn en berichtje moet krijgen 
def wachtrij(MaxVisit):
    # code voor sms berichtje als je bijna aan de beurt bent
    test = math.ceil(MaxVisit * 1.15)
    # hier moet staan dat er een sms bericht word gestuurd naar de gebruiker
    return test

#telefoon nummer word opgehaald gebasseerd op rfid nummer
def phoneNumber(rfid):
    try:
        mycursor = connection.cursor()
        mycursor.execute("SELECT user_id FROM tags WHERE TagData = \'"+ str(rfid) +"\'")
        myresult = mycursor.fetchall()
        for x in myresult:
            user_id = x[0]
        mycursor.execute("SELECT phoneNumber FROM users WHERE id = \'"+ str(user_id) + "\'")
        myresult = mycursor.fetchall()
        for x in myresult:
            phonenumber = x[0]
        connection.commit()
        return phonenumber
    except UnboundLocalError:
        connection.commit()
        return None

def ownerID(rfid):
    try:
        mycursor = connection.cursor()
        mycursor.execute("SELECT user_id FROM tags WHERE TagData = \'"+ str(rfid) +"\'")
        myresult = mycursor.fetchall()
        for x in myresult:
            user_id = x[0]
        connection.commit()
        return user_id
    except UnboundLocalError:
        connection.commit()
        return None

#returned max visitors van een winkel
def maxVisit(shopID):
    mycursor = connection.cursor()
    mycursor.execute("SELECT * FROM registerd_shops WHERE id = '"+ str(shopID) + "'")
    myresult = mycursor.fetchall()
    for x in myresult:
        MaxVisit = x[3]
    connection.commit()
    return MaxVisit

def insertWachtrij(shopID, ownerID):
    mycursor = connection.cursor()
    sql = "INSERT INTO wachtrij (shopID, user_id, physical, created_at, updated_at) VALUES (%s, %s, %s, now(), now())"
    val = (shopID, ownerID, True)
    mycursor.execute(sql, val)
    connection.commit()

#press keys for keyboard input
def pressKey(key):
    keyboard = Controller()
    keyboard.press(key)
    keyboard.release(key)

def typeText(text):
    keyboard = Controller()
    keyboard.type(text)

def wachtrijExists(shopID, ownerID):
    mycursor = connection.cursor()
    sql = "SELECT * FROM wachtrij WHERE user_id = %s AND shopID = %s"
    val = (ownerID, shopID)
    mycursor.execute(sql, val)
    myresult = mycursor.fetchall()
    if(len(myresult) >= 1):
        connection.commit()
        return True
    elif(len(myresult) <= 1):
        connection.commit()
        return False
    connection.commit()
    print(len(myresult))

def wachtrijPhysical(shopID, ownerID):
    mycursor = connection.cursor()
    sql = "SELECT * FROM wachtrij WHERE user_id = %s AND shopID = %s"
    val = (ownerID, shopID)
    mycursor.execute(sql, val)
    myresult = mycursor.fetchall()
    print(myresult)
    for x in myresult:
        connection.commit()
        return x[3]

def removeWachtrij(shopID, ownerID):
    mycursor = connection.cursor()
    sql = "DELETE FROM wachtrij WHERE user_id = %s AND shopID = %s"
    val = (ownerID, shopID)
    mycursor.execute(sql,val)
    connection.commit()

def setWachtrijPhysical(shopID, ownerID):
    mycursor = connection.cursor()
    sql = "UPDATE wachtrij set physical = True, updated_at = now() WHERE user_id = %s AND shopID = %s"
    val = (ownerID, shopID)
    mycursor.execute(sql,val)
    connection.commit()