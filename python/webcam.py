import time
import cv2
import os
import time
from time import strftime, gmtime
from datetime import datetime
import shutil

while True:
    camera = cv2.VideoCapture(0)
    time.sleep(1) #Gives the sensor time to gather light
    ret, image = camera.read()
    path="/Applications/MAMP/htdocs/ProjetoTI/src/img"
    cv2.imwrite(os.path.join(path , 'webcam.jpg'), image)
    now = datetime.now() # current date and time
    date_time = now.strftime("%d/%m/%Y, %H:%M:%S")
    src_dir="/Applications/MAMP/htdocs/ProjetoTI/src/img/webcam.jpg"
    dst_dir="/Applications/MAMP/htdocs/ProjetoTI/src/img/webcamHistory/webcam-"+str(now)+".jpg"
    shutil.copy(src_dir,dst_dir)
    
    cv2.destroyAllWindows()
    time.sleep(5)