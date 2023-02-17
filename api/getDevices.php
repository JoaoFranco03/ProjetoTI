<?php
      //Conecta ao Servidor
      include('connection.php');
      //Obtem a Divisao da pagina
      $divisaoPage = $_GET["divisaoPage"];
      //Procura por Dispositivos na Divisao
      $sql = "SELECT * FROM `dispositivos` WHERE divisao = '$divisaoPage';";
      $result = mysqli_query($con, $sql);

      while ($row = mysqli_fetch_array($result)) {
            //Cria as Variaveis com base nos dados da base de dados
            $id = $row['id'];
            $nome = $row['nome'];
            $divisao = $row['divisao'];
            $tipoDispositivo = $row['tipoDispositivo'];
            $consumo = $row['consumo'];
            $estado = $row['estado'];
            $valor = $row['valor'];
            $maxValor = $row['valorMaximo'];

            if($maxValor <= 2) //É 2 e não 1 porque a ventoinha tem 3 estados
            {
                  if ($valor == 2)
                  {
                        if($tipoDispositivo=="Ventoinha")
                              echo '<div class="col-6 col-xs-6 col-sm-6 col-md-3 col-lg-2 d-flex">
                              <div class="d-grid mb-4">
                                    <button type="submit" id="deviceID" name="deviceID" data-id="'.$id.'" data-bs-toggle="modal" data-bs-target="#Modal" class="sendData btn card-'.$estado.' btn-light float-end text-start">
                                    <img class="device-icon" src="src/icons/'.$tipoDispositivo.'-'.$estado.'.svg" alt="'.$tipoDispositivo.'">
                                    <h3 id="id" class="card-title d-none">'.$id.'</h3>
                                    <h3 class="card-title" id="name">'.$nome.'</h3>
                                    <h5 id="class" class="text-left"><b class="'.$estado.'">'.$estado.'</b></h5>
                                    <h5 class="action-text text-left" id="value">Velocidade Máxima</h5>
                                    </button>
                              </div>
                        </div>';
                        else
                              echo '<div class="col-6 col-xs-6 col-sm-6 col-md-3 col-lg-2 d-flex">
                              <div class="d-grid mb-4">
                                    <button type="submit" id="deviceID" name="deviceID" data-id="'.$id.'" data-bs-toggle="modal" data-bs-target="#Modal" class="sendData btn card-'.$estado.' btn-light float-end text-start">
                                    <img class="device-icon" src="src/icons/'.$tipoDispositivo.'-'.$estado.'.svg" alt="'.$tipoDispositivo.'">
                                    <h3 id="id" class="card-title d-none">'.$id.'</h3>
                                    <h3 class="card-title" id="name">'.$nome.'</h3>
                                    <h5 id="class" class="text-left"><b class="'.$estado.'">'.$estado.'</b></h5>
                                    <h5 class="action-text text-left" id="value">Lumonisidade Máxima</h5>
                                    </button>
                              </div>
                        </div>';
                  } else {
                        if($valor == 1)
                        {
                              echo '<div class="col-6 col-xs-6 col-sm-6 col-md-3 col-lg-2 d-flex">
                              <div class="d-grid mb-4">
                                    <button type="submit" id="deviceID" name="deviceID" data-id="'.$id.'" data-bs-toggle="modal" data-bs-target="#Modal" class="sendData btn card-'.$estado.' btn-light float-end text-start">
                                       <img class="device-icon" src="src/icons/'.$tipoDispositivo.'-'.$estado.'.svg" alt="'.$tipoDispositivo.'">
                                       <h3 id="id" class="card-title d-none">'.$id.'</h3>
                                       <h3 class="card-title" id="name">'.$nome.'</h3>
                                       <h5 id="class" class="text-left"><b class="'.$estado.'">'.$estado.'</b></h5>
                                    </button>
                              </div>
                           </div>';    
                        } else {
                              echo '<div class="col-6 col-xs-6 col-sm-6 col-md-3 col-lg-2 d-flex">
                              <div class="d-grid mb-4">
                                    <button type="submit" id="deviceID" name="deviceID" data-id="'.$id.'" data-bs-toggle="modal" data-bs-target="#Modal" class="sendData btn card-'.$estado.' btn-light float-end text-start">
                                       <img class="device-icon" src="src/icons/'.$tipoDispositivo.'-'.$estado.'.svg" alt="'.$tipoDispositivo.'">
                                       <h3 id="id" class="card-title d-none">'.$id.'</h3>
                                       <h3 class="card-title" id="name">'.$nome.'</h3>
                                       <h5 id="class" class="text-left"><b class="'.$estado.'">'.$estado.'</b></h5>
                                    </button>
                              </div>
                           </div>';   
                        }
                  }
            }
            else
            {
                  echo '<div class="col-6 col-xs-6 col-sm-6 col-md-3 col-lg-2 d-flex">
                  <div class="d-grid mb-4">
                       <button type="submit" id="deviceID" name="deviceID" data-id="'.$id.'" data-bs-toggle="modal" data-bs-target="#Modal" class="sendData btn card-'.$estado.' btn-light float-end text-start">
                           <img class="device-icon" src="src/icons/'.$tipoDispositivo.'-'.$estado.'.svg" alt="'.$tipoDispositivo.'">
                           <h3 id="id" class="card-title d-none">'.$id.'</h3>
                           <h3 class="card-title" id="name">'.$nome.'</h3>
                           <h5 id="class" class="text-left"><b class="'.$estado.'">'.$estado.'</b></h5>
                           <h5 class="action-text text-left" id="value">'.$valor.'%</h5>
                       </button>
                        </div>
                     </div>';
            }
            //Cria o Card

      }
?>