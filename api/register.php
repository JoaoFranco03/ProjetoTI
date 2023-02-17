<?php      
    //Faz o Registo do User na Base de Dados
    include('connection.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];
    $admin = $_POST['check'];

    
    if ($_POST['check'] = 'on')
        $admin = 1;
    else
        $admin = 0;
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "select * from login where username = '$username'";  
        $result = mysqli_query($con, $sql);  
        $count = mysqli_num_rows($result);  

        if ($count == 1)
        {
            header("Location: /ProjetoTI/signup.php?error=login");
        }
        else 
        {
            $sql = "INSERT INTO login (username,password,privileges) VALUES ('$username','$password','$admin')";  
            $result = mysqli_query($con, $sql);  
            header('Location: /ProjetoTI/index.php'); 
        }
?>  