<?php      
    //Concecta ao Servidor
    include('connection.php');  
    //Obtem as Variaveis do Form
    $username = $_POST['user'];  
    $password = $_POST['pass'];
    //Inicia a Sessao
    session_start();
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        //Seleciona a linha com o Username e Password Inseridos
        $sql = "select * from login where username = '$username'";  
        $result = mysqli_query($con, $sql);  
        $count = mysqli_num_rows($result);  
                
        //Procura por Privilegios de Administrador relativos ao Username Inserido na Base de Dados
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $hash = $row['password'];
            $privileges = $row['privileges'];

        }

        //Se Existir um user com os dados inseridos entra no Dashboard
        if($count == 1){  
            if (password_verify($password, $hash)) {
                $_SESSION["user"]=$_POST['user'];
                $_SESSION["privileges"]=$privileges;
                header('Location: /ProjetoTI/dashboard.php');
            }
            else {
                header("Location: /ProjetoTI/index.php?error=login");
            }
        }  
        //Senão mostra um Alert na pagina de Login
        else{  
            header("Location: /ProjetoTI/index.php?error=login");
        }
