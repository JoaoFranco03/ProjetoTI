import requests
import sys
import time
from time import strftime, gmtime
from datetime import datetime
import simpleaudio

while True:
    r=requests.get('http://localhost:8888/ProjetoTI/api/ciscoAlertSensorsLink.php?id=14')
    print(r.text)
    if ((r.text).strip()=="1"):
        wave_obj = simpleaudio.WaveObject.from_wave_file('/Applications/MAMP/htdocs/ProjetoTI/src/sounds/siren.wav')
        play_obj = wave_obj.play() # tocar o audio-
        play_obj.wait_done() # espera ate o audio terminar 