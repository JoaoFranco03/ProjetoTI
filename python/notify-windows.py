from ast import While
import requests
import time
from time import sleep, strftime, gmtime
from datetime import datetime
from win10toast import ToastNotifier


print("Notify Motion App now running")


while True:
    r=requests.get('http://localhost:8888/ProjetoTI/api/ciscoAlertSensorsLink.php?id=13')
    print(r.text)
    time.sleep(1)
    if ((r.text).strip()=="1"):
        toaster = ToastNotifier()
        toaster.show_toast("🚨ALERTA!!!","Movimento Detetado na Sala de Estar")