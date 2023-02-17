<?php
    include('connection.php');
    //Faz Updata ao Estado
    $sql = "UPDATE sensores SET estado='Off' WHERE bateria=0";
    $result = mysqli_query($con, $sql);
    $sql = "UPDATE sensores SET estado='On' WHERE bateria>0";
    $result = mysqli_query($con, $sql);
    $sql = "UPDATE dispositivos SET estado='Off' WHERE valor=0";
    $result = mysqli_query($con, $sql);
    $sql = "UPDATE dispositivos SET estado='On' WHERE valor>0";
    $result = mysqli_query($con, $sql);
    $sql = "UPDATE sensores SET alerta=0 WHERE estado='Off'";
    $result = mysqli_query($con, $sql);
?>