<?php
    //Conecta ao Servidor
    include('connection.php');
    //Obtem a Divisao da Pagina
    $divisaoPage = $_GET["divisaoPage"];
    // Obtem todos os Sensores da Página
    $sql = "SELECT * FROM `sensores` WHERE divisao = '$divisaoPage';";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_num_rows($result);

    while ($row = mysqli_fetch_array($result)) {
            //Cria as Variaveis
            $nome = $row['nome'];
            $divisao = $row['divisao'];
            $valor = $row['valor'];
            $estado = $row['estado'];
            $tipoSensor = $row['tipoSensor'];
            $alerta = $row['alerta'];
            $bateria = $row['bateria'];
            //Cria os Butoes dos Sensores
            if (empty($valor))
            {
               if($estado == "Off")
               {
                  echo '            <div class="sensor">
                  <button type="button" class="sensors-btn me-3"> <img class="sensor-icon" src="src/icons/'.$tipoSensor.'-'.$estado.'.svg" alt=""></button>
                  <h5 class="sensor-text">'.$tipoSensor.':<br>Sem Bateria</h5>   
               </div>';
               }
            }
         else
         echo '            <div class="sensor">
         <button type="button" class="sensors-btn me-3"> <img class="sensor-icon" src="src/icons/'.$tipoSensor.'-'.$estado.'.svg" alt=""></button>
         <h5 class="sensor-text">'.$tipoSensor.':<br>'.$valor.'%</h5>   
      </div>';
      }
?>

