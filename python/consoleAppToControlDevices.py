import requests

print("\n\n\n\n\n\n\nSoftware Name: consoleAppToControlDevices")
while True:
    deviceOrSensorVar = input("\nDeseja controlar um dispositivo (Prima 1) ou obter o valor de um sensor? (Prima 2) : ")
    if ((deviceOrSensorVar == "1") or (deviceOrSensorVar == "2")):
        break
    else:
        print("\nERRO - Insira um Valor Valido")

if (deviceOrSensorVar == "1"):
    #Dispositivo
    deviceIdVar = input("\nQual é o ID do dispositivo que pretende controlar: ")
    action = input("\nPretende ligar/desligar o dispositivo (0 - Desligar / 1 - Ligar):")
    if ((action == "0") or (action == "1")):
        if ((action == "0")):
            data = {'Id': deviceIdVar,
                    'value': 0}
            r=requests.post(url = 'http://localhost:8888/ProjetoTI/api/ciscoDevicesLink.php', data = data)
            if(r.status_code == 200):
                print("OK, O Dispositivo foi desligado com sucesso")
            else:
                print("ERRO - Na ligação ao Servidor")
        else:
           if ((action == "1")):
            data = {'Id': deviceIdVar,
                    'value': 1}
            r=requests.post(url = 'http://localhost:8888/ProjetoTI/api/ciscoDevicesLink.php', data = data)
            if(r.status_code == 200):
                print("OK, O Dispositivo foi ligado com sucesso")
            else:
                print("ERRO - Na ligação ao Servidor")
    else:
        print("\nERRO - Insira um Valor Valido")

if (deviceOrSensorVar == "2"):
    #Sensores
    sensorID = input("\nQual é o ID do sensor que pretende obter informações: ")
    r=requests.get('http://localhost:8888/ProjetoTI/api/ciscoSensorsLink.php?id='+sensorID)
    if(r.status_code == 200):
        string = str(r.text)
        if (r.text.strip() == ""):
            r=requests.get('http://localhost:8888/ProjetoTI/api/ciscoAlertSensorsLink.php?id='+sensorID)
            if (r.text.strip()=="0"):
                print("\nO Dispositivo não está em alerta\n")
            else:
                print("\nO Dispositivo está em alerta\n")
        else:
            print("\nO Valor do sensor é "+r.text.strip()+"%\n")
    else:
        print("ERRO - Na ligação ao Servidor")

