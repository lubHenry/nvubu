import cv2
from twilio.rest import Client
from datetime import datetime

import mysql.connector

# Read text from the credentials file and store in data variable
with open('credentials.txt', 'r') as myfile:
     data = myfile.read()

# Convert data variable into dictionary
info_dict = eval(data)

# Your Account SID from twilio.com/console
account_sid = info_dict['account_sid']

# Your Auth Token from twilio.com/console
auth_token  = info_dict['auth_token']

#cam = cv2.VideoCapture(0) #computer webcam
cam = cv2.VideoCapture('http://192.168.13.109:8080/video') #live camera feed
while cam.isOpened():
    ret, frame1 = cam.read()
    ret, frame2 = cam.read()
    diff = cv2.absdiff(frame1,frame2)
    gray = cv2.cvtColor(diff,cv2.COLOR_RGB2GRAY)
    blur = cv2.GaussianBlur(gray,(5,5),0)
    _, thresh = cv2.threshold(blur,20,255,cv2.THRESH_BINARY)
    dilated = cv2.dilate(thresh,None,iterations=3)
    contours, _ = cv2.findContours(dilated,cv2.RETR_TREE,cv2.CHAIN_APPROX_SIMPLE)
    #cv2.drawContours(frame1,contours,-1,(0,255,0),2)
    for c in contours:
        if cv2.contourArea(c) < 5000:
            continue
        x,y,w,h = cv2.boundingRect(c)
        cv2.rectangle(frame1,(x,y),(x+w, y+h),(0,255,0),2)

    if cv2.waitKey(10) == ord('q'):
        break
    cv2.imshow('Sector 13', frame1)
# Set client and send the message
#client = Client(account_sid, auth_token)
#message = client.messages.create(to=info_dict['your_num'], from_=info_dict['trial_num'],
                                         #body="Animal About to cross sector 13, in five hours")
try:
    connection = mysql.connector.connect(host='localhost',
                                         database='********',
                                         user='********',
                                         password='********')

    mySql_insert_query = """INSERT INTO posts (post,type,sector,userid,date_created,posted_by) 
                            VALUES (%s, %s, %s,%s, %s, %s) """

    cursor = connection.cursor()
    current_Date = datetime.now()
    # convert date in the format you want
    formatted_date = current_Date.strftime('%Y-%m-%d %H:%M:%S')
    insert_tuple = ('Possible Animal intrusion dectected in sector 13, animals to probably breach barrier in 1 hour',
                    1,13, 1, current_Date, 1)

    result = cursor.execute(mySql_insert_query, insert_tuple)
    connection.commit()
    print("Date Record inserted successfully")

except mysql.connector.Error as error:
    connection.rollback()
    print("Failed to insert into MySQL table {}".format(error))

finally:
    if connection.is_connected():
        cursor.close()
        connection.close()
        print("MySQL connection is closed")
