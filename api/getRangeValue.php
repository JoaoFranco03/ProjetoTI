<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET')
if (isset($_GET["id"]) && isset($_GET["max"])) {
    //Obtem as Variaveis do Form
    $idDevice = $_GET['id'];
    $maxOption = $_GET['max'];
    //Inicia a Sessao
    session_start();
    //Verifica se o parametro max do Método GET é igual a 0
    //Ou seja, que o Pedido HTTP Pretende obter o Valor Minimo 
    if ($maxOption == 0)
    {
        $sql = "SELECT valorMinimo FROM dispositivos WHERE id = $idDevice";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result)) {
            //Obtem Valor Minimo da BD
            $valor = $row['valorMinimo'];
            echo ($valor);
        }
    }
    //Verifica se o parametro max do Método GET é igual a 1
    //Ou seja, que o Pedido HTTP Pretende obter o Valor Maximo 
    else
    {
        $sql = "SELECT valorMaximo FROM dispositivos WHERE id = $idDevice";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result)) {
            //Obtem Valor Maximo da BD
            $valor = $row['valorMaximo'];
            echo ($valor);
        }
    }
    } else {
        echo ("Metodo Nao Permitido");
    }
?>