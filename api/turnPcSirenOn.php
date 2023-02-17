<?php
header('Content-Type text/html; charset=utf8');
//Concecta ao Servidor
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo ("Recebi um POST");
    print_r($_POST);
    if (isset($_POST["alerta"])) {
        //Obtem as Variaveis do Form
        $change = $_POST['alerta'];
        //Inicia a Sessao
        session_start();
        $sql = "SELECT alerta FROM sensores WHERE id = 14";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $alerta = $row['alerta'];
            print_r($alerta);
            if ($alerta == 0){
                $sql = "UPDATE sensores SET alerta = 1 WHERE id = 14";
                $result = mysqli_query($con, $sql);
            } else {
                $sql = "UPDATE sensores SET alerta = 0 WHERE id = 14";
                $result = mysqli_query($con, $sql);
            }
        }
        echo ("ALOOOO");
    } else {
        http_response_code(403);
        echo ('("erro": "Os parametros recebidos nao sao validos!")' . PHP_EOL);
    }
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        if (isset($_GET["id"])) 
        {
            //Obtem as Variaveis do Form
            $idSensor = $_GET['id'];
            //Inicia a Sessao
            session_start();
            $sql = "SELECT * FROM sensores WHERE id = $idSensor";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result)) {
                $valor = $row['valor'];
                echo($valor);
            }
        }
    } 
    else
    {
        echo ("Metodo Nao Permitido");
    }
}
