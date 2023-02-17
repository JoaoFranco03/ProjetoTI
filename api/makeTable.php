<?php
//Liga ao Servidor
    include('connection.php');
//Define o Fuso Horario
    date_default_timezone_set('Europe/Lisbon');
    //Seleciona toda a tabela historico de dispositivos
        $sql = "SELECT * FROM `historicoDispositivos`";
        $result = mysqli_query($con, $sql);
        $rows = mysqli_num_rows($result);

        while ($row = mysqli_fetch_array($result)) {
            //cria as variaveis
            $id = $row['id']; 
            $nome = $row['nome'];
            $divisao = $row['divisao'];
            $tipoDispositivo = $row['tipoDispositivo'];
            $estado = $row['estado'];
            $valor = $row['valor'];
            $dia = $row['dia'];
            $hora = $row['hora'];
            //cria a tabela
            echo '<tr>
                <th scope="row">'.$id.'</th>
                <td>'.$nome.'</td>
                <td>'.$tipoDispositivo.'</td>
                <td>'.$divisao.'</td>
                <td>'.$estado.'</td>
                <td>'.$valor.'</td>
                <td>'.$dia.'</td>
                <td>'.$hora.'</td>
              </tr>';
        };
?>

