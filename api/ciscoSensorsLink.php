<?php
header('Content-Type text/html; charset=utf8');
//Concecta ao Servidor
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo ("Recebi um POST");
    print_r($_POST);
    if (isset($_POST["Id"]) && isset($_POST["value"])) {
        //Obtem as Variaveis do Form
        $idSensor = $_POST['Id'];
        $value = $_POST['value'];
        //Inicia a Sessao
        session_start();
        $sql = "UPDATE sensores SET valor = $value WHERE id = $idSensor";
        $result = mysqli_query($con, $sql);
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
