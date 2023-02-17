<?php
    //Conecta ao Servidor
    include('connection.php');

    //Conta todos os Dispositivos
    $sql = "select divisao, count(*) as c FROM dispositivos GROUP BY divisao;";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_num_rows($result);


    while ($row = mysqli_fetch_array($result)) {
        $numDispositivos = $row['c'];
        //Cria uma String que ira ser inserida no Script da Chart
        $stringNumRooms = $stringNumRooms.''.$numDispositivos.',';
    }
    //Substrai o ultimo caracter (,) da String
    echo substr($stringNumRooms, 0, strlen($stringNumRooms)-1);
?>