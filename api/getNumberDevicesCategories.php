<?php
    //Conecta ao Servidor
    include('connection.php');

    //Conta todos os Dispositivos
    $sql = "select tipoDispositivo, count(*) as c FROM dispositivos GROUP BY tipoDispositivo;";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_num_rows($result);

    while ($row = mysqli_fetch_array($result)) {
        $numDispositivos = $row['c'];
        //Cria uma String que ira ser inserida no Script da Chart
        $stringNum = $stringNum.''.$numDispositivos.',';
    }
    //Substrai o ultimo caracter (,) da String
    echo substr($stringNum, 0, strlen($stringNum)-1);
?>