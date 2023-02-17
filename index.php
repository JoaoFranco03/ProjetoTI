<!DOCTYPE html>
<html lang="pt">
<head>
    <!-- Safari 15 Tab UI Color -->
    <meta name="theme-color" content="#ABA89E">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/favicons/login.ico" />
    <link rel="stylesheet" href="src/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
   <?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET["error"]))
        {           
            echo '        <div class="alert alert-danger alert-dismissible fade show mb-0 h-100 m-0">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <div class="text-center">
                <strong class="text-center">Username / Password Inválido!</strong>
            </div>
        </div>'; 
        }
   }
   ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 col-sm-12 px-0">
                <img src="https://images.unsplash.com/photo-1519710164239-da123dc03ef4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1974&q=80" alt="Home" class="photoColumn">
            </div>
            <div class="col-md-7 col-sm-12 h-100 my-auto">
                <div class="row">
                    <div class="d-flex">
                        <img src="src/img/logos/IPL_Grey.png" class="logo" alt="Politécnico de Leiria">
                    </div>
                </div>
                <form action = "api/authentication.php" onsubmit = "return validation()" method = "POST">
                <h1 class="text-center">Login</h1>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="user" class="form-control" id="user" aria-describedby="usernameHelp" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="pass" class="form-control" id="password" placeholder="●●●●●●" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-dark text-center" value="Login">Login</button>
                    </div>
                    <div class="text-center" style="padding-top: 20px;">
                    <a href="../ProjetoTI/signup.php">Criar Conta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>