<?php
    // Conecta ao Servidor
    include('connection.php');
    
    //Pesquisa todos os Tipos de Dispositivos
    $sql = "SELECT tipoDispositivo FROM dispositivos GROUP BY tipoDispositivo;";
    $result = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_array($result)) {
        $tipoDispositivo = $row['tipoDispositivo'];
        //Cria uma String que ira ser inserida no Script da Chart
        $string = $string.'"'.$tipoDispositivo.'",';
    }
    //Substrai o ultimo caracter (,) da Stringx
    echo substr($string, 0, strlen($string)-1);
