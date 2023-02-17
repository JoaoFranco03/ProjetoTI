<?php
    include('connection.php');

        $sql = "SELECT * FROM `sensores` WHERE alerta = 1;";
        $result = mysqli_query($con, $sql);
        $rows = mysqli_num_rows($result);

        while ($row = mysqli_fetch_array($result)) {
            $nome = $row['nome'];
            $divisao = $row['divisao'];
            $valor = $row['valor'];
            $estado = $row['estado'];
            $tipoSensor = $row['tipoSensor'];
            $alerta = $row['alerta'];
            $bateria = $row['bateria'];
            echo '            <div class="sensor">
            <button type="button" class="sensors-btn me-3"> <img class="sensor-icon" src="src/icons/'.$tipoSensor.'-'.$estado.'.svg" alt=""></button>
            <h5 class="sensor-text">'.$tipoSensor.' - '.$divisao.'<br>ALERTA!!!</h5>   
         </div>';
      }
?>