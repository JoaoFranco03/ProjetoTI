<?php
    // Conecta ao Servidor
    $host = "localhost";  
    $user = "root";  
    $password = 'root';  
    $db_name = "ProjetoTI";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>  