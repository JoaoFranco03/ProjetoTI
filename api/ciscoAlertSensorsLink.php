<?php
header('Content-Type text/html; charset=utf8');
//Concecta ao Servidor
include('connection.php');

//Funcionalidade para Alteração do valor de alerta dos sensores
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo ("Recebi um POST");
    print_r($_POST);
    if (isset($_POST["Id"]) && isset($_POST["value"])) {
        //Concecta ao Servidor
        include('connection.php');
        //Obtem as Variaveis do Form
        $idDevice = $_POST['Id'];
        $value = $_POST['value'];
        //Inicia a Sessao
        session_start();
        //Atualiza o valor do sensor
        $sql = "UPDATE sensores SET valor = $value WHERE id = $idDevice";
        $result = mysqli_query($con, $sql);
    } else {
        if (isset($_POST["Id"]) && isset($_POST["alerta"])) {
            //Concecta ao Servidor
            include('connection.php');
            //Obtem as Variaveis do Form
            $idDevice = $_POST['Id'];
            $alert = $_POST['alerta'];
            //Inicia a Sessao
            session_start();
        //Atualiza o valor de Alerta
            $sql = "UPDATE sensores SET alerta = $alert WHERE id = $idDevice";
            $result = mysqli_query($con, $sql);
        }
        else
        {
            http_response_code(403);
            echo ('("erro": "Os parametros recebidos nao sao validos!")' . PHP_EOL);
        }
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
                $alerta = $row['alerta'];
                echo($alerta);
            }
        }
    } 
    else
    {
        echo ("Metodo Nao Permitido");
    }
}
?>