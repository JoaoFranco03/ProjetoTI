from ast import While
import os
from signal import pause
import requests
import time
from time import sleep, strftime, gmtime
from datetime import datetime

print("Notify Motion App now running")

def notify(title, text):
    os.system("""
              osascript -e 'display notification "{}" with title "{}"'
              """.format(text, title))

while True:
    r=requests.get('http://localhost:8888/ProjetoTI/api/ciscoAlertSensorsLink.php?id=13')
    print(r.text)
    time.sleep(1)
    if ((r.text).strip()=="1"):
        notify("🚨ALERTA!!!", "Movimento Detetado na Sala de Estar")
        time.sleep(6) #Tempo para desligar se não houver movimento
