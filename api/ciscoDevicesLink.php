<?php
header('Content-Type text/html; charset=utf8');
//Concecta ao Servidor
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo ("Recebi um POST");
    print_r($_POST);
    if (isset($_POST["Id"]) && isset($_POST["value"])) {
        //Obtem as Variaveis do Form
        $idDevice = $_POST['Id'];
        $value = $_POST['value'];
        //Inicia a Sessao
        session_start();
        //Seleciona a linha com o Username e Password Inseridos
        $sql = "UPDATE dispositivos SET valor = $value WHERE id = $idDevice";
        $result = mysqli_query($con, $sql);

        //Faz um Log
        date_default_timezone_set('Europe/Lisbon');
        $divisaoPage = $_POST["divisaoPage"];
        $sql = "SELECT * FROM `dispositivos` WHERE divisao = '$divisaoPage';";
        $result = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_array($result)) {
            $nome = $row['nome'];
            $divisao = $row['divisao'];
            $tipoDispositivo = $row['tipoDispositivo'];
            $consumo = $row['consumo'];
            $estado = $row['estado'];
            $valor = $row['valor'];
            $hora = date('H:i:s');
            $dia = date('d/m/Y', time());
            $sqlCommand = 'INSERT INTO historicoDispositivos (nome, divisao, tipoDispositivo, estado, valor, dia, hora) VALUES ("' . $nome . '", "' . $divisao . '", "' . $tipoDispositivo . '", "' . $estado . '", "' . $valor . '", "' . $dia . '", "' . $hora . '");';
            $result = mysqli_query($con, $sqlCommand);
        };
    } else {
        http_response_code(403);
        echo ('("erro": "Os parametros recebidos nao sao validos!")' . PHP_EOL);
    }
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'GET')
        if (isset($_GET["id"])) {
            //Obtem as Variaveis do Form
            $idDevice = $_GET['id'];
            //Inicia a Sessao
            session_start();
            //Seleciona a linha com o Username e Password Inseridos
            $sql = "SELECT valor FROM dispositivos WHERE id = $idDevice";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result)) {
                $valor = $row['valor'];
                echo ($valor);
            }
        } else {
            echo ("Metodo Nao Permitido");
        }
}
