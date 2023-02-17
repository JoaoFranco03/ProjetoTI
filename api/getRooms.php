<?php
    //Conecta ao Servidor
    include('connection.php');

    //Pesquisa todos os Tipos de Dispositivos
    $sql = "SELECT divisao FROM dispositivos GROUP BY divisao;";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_num_rows($result);


    while ($row = mysqli_fetch_array($result)) {
        $tipoDispositivo = $row['divisao'];
        //Cria uma String que ira ser inserida no Script da Chart
        $stringRooms = $stringRooms.'"'.$tipoDispositivo.'",';
    }
    //Substrai o ultimo caracter (,) da String
    echo substr($stringRooms, 0, strlen($stringRooms)-1);

?>