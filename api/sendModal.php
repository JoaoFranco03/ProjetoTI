<?php
    //Faz update ao valor do dispositivo na Base de dados
    include('connection.php');
    $cardID = $_POST['idID'];
    $range = $_POST['idRange'];  
    $sql = "UPDATE dispositivos SET valor = $range WHERE id=$cardID";
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
        $sqlCommand = 'INSERT INTO historicoDispositivos (nome, divisao, tipoDispositivo, estado, valor, dia, hora) VALUES ("'.$nome.'", "'.$divisao.'", "'.$tipoDispositivo.'", "'.$estado.'", "'.$valor.'", "'.$dia.'", "'.$hora.'");';
    };
    $sqlCommand = substr($sqlCommand, 0, strlen($sqlCommand)-1);
    $result = mysqli_query($con, $sqlCommand);
    header('Location: '.$_SERVER['HTTP_REFERER'].'');
?>