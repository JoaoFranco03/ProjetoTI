<!-- Restringe a entrada na página a utilizadores Administradores -->
<?php include("api/checkAdmin.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Safari 15 / Chrome Mobile Tab UI Color -->
   <meta name="theme-color" content="#F8F9FA">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Icons - Navbar -->
   <script src="https://kit.fontawesome.com/2cc7268e45.js" crossorigin="anonymous"></script>
   <!-- CDN referente ao Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
   integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <!-- CSS -->
   <link rel="stylesheet" href="src/css/seguranca.css" />
   <link rel="stylesheet" href="src/css/components/navbar/navbar-dark.css" />
   <link rel="stylesheet" href="src/css/universal.css" />
   <link rel="stylesheet" href="src/css/rooms.css" />
   <!-- Titulo -->
   <title>Segurança</title>
   <!-- FavIcon -->
   <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
   <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
   <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
   <link rel="manifest" href="/site.webmanifest">
   <script src="http://code.jquery.com/jquery-latest.js"></script>
   <script>
      //Script para atualizar o estado dos sensores dependendo do nível da bateria sem dar Refresh à Pagina
      //Script para atualizar o estado dos dispositivos dependendo do valor sem dar Refresh à Pagina
      $(document).ready(function() {
         $("#values_check").load("api/updateStatus.php");
         setInterval(function() {
            $("#values_check").load("api/updateStatus.php");
         }, 1000);
      });

      $(document).ready(function() {
         $("#sensors_refresh").load("api/getSensorsAlert.php");
         setInterval(function() {
            $("#sensors_refresh").load("api/getSensorsAlert.php");
         }, 1000);
      });

      window.setInterval(function() {
         document.getElementById('webcam').src = "src/img/webcam.jpg?random=" + new Date().getTime();
      }, 5000);
   </script>
   <style>
      body {
         background-image: url("./src/img/rooms/home.jpg");
         background-position: center;
         background-repeat: no-repeat;
         background-size: cover;
         background-attachment: fixed;
      }
   </style>
</head>

<body>
   <div class="container-fluid background">
      <div class="row">
         <div class="col-7">
            <h1 class="main-title">Segurança</h1>
         </div>
         <div class="col-5">
            <div class="float-end">
               <div class="dropdown-avatar">
                  <button class="btn btn-avatar btn-light dropdown-toggle border-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"> <img src="src/icons/avatar.jpeg" class="icon-avatar shadow-sm" alt="">
                     <?php echo $_SESSION['user'] ?>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                     <a class="dropdown-item" href="../ProjetoTI/api/logout.php">Logout</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Secção - Alertas -->
      <div class="row">
         <div class="scroll-x" id="sensors_refresh">
            <?php include("api/getSensorsAlert.php") ?>
         </div>
      </div>
      <!-- Secção - Ações -->
      <div class="row">
         <h2 class="rotinas">Ações</h2>
         <div class="scroll-x">
            <iframe name="doNothing" style="display:none;"></iframe>
            <form action="api/turnPcSirenOn.php" method="post" target="doNothing">
               <button type="submit" id="alerta" name="alerta" value="change" class="scenes-btn btn-romance me-3"> 
                  <img class="icon" src="src/icons/Sirene-On.svg" alt="">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDisparar Alarme</input>
            </form>
         </div>
      </div>
      <!-- Secção - Cameras -->
      <div class="row">
         <h1 class="rotinas">Camera</h1>
         <div class="slide-row">
            <div class="row" style="width: 100%;">
               <div class="col-xl col-lg-3 col-md-4 col-sm-6 pb-4">
                  <div class="card-camera card card-block ">
                     <div class="card-body">
                        <p class="card-text">
                           &nbsp&nbsp&nbspWebcam
                        </p>
                     </div>
                     <img data-bs-toggle="modal" data-bs-target="#history" id="webcam" src="src/img/webcam.jpg" class="card-img-bottom card-camera-video"></img>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Image Modal -->
      <div class="modal fade bd-example-modal-lg" tabindex="-1" data-toggle="modal" role="dialog" aria-labelledby="myLargeModalLabel" id="history" aria-hidden="true">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Histórico da Webcam</h5>
               </div>
               <div class="modal-body">
                  <div class="container-fluid">
                     <div class="row">
                        <?php include("api/webcamHistory.php") ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Secção - Dispositivos -->
      <nav class="navbar fixed-bottom">
         <div class="container-fluid justify-content-center">
            <ul class="nav nav-justified">
               <li class="nav-item active">
                  <a class="nav-link" aria-current="page" href="dashboard.php"><i class="fa-solid fa-house-chimney"></i><br>Home</a>
               </li>
               <!-- Botão Dropdown -->
               <div class="nav-item dropup">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     <i class="fa-solid fa-house-chimney-window"></i><br>Divisões
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                     <li><a class="dropdown-item" href="livingroom.php"><i class="fa-solid fa-couch"></i>&nbsp&nbspSala</a></li>
                     <li><a class="dropdown-item" href="bedroom.php"><i class="fa-solid fa-bed"></i>&nbsp&nbspQuarto</a></li>
                     <li><a class="dropdown-item" href="kitchen.php"><i class="fa-solid fa-kitchen-set"></i>&nbsp&nbspCozinha</a></li>
                     <li><a class="dropdown-item" href="bathroom.php"><i class="fa-solid fa-toilet"></i>&nbsp&nbspCasa de Banho</a></li>
                     <li><a class="dropdown-item" href="garage.php"><i class="fa-solid fa-warehouse"></i>&nbsp&nbspGaragem</a></li>
                     <li><a class="dropdown-item" href="garden.php"><i class="fa-solid fa-faucet-drip"></i>&nbsp&nbspJardim</a></li>
                  </ul>
               </div>
               <li class="nav-item">
                  <a class="nav-link" href="historico.php"><i class="fa-solid fa-clock-rotate-left"></i><br>Histórico</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" href="seguranca.php"><i class="fa-solid fa-shield-halved"></i><br>Segurança</a>
               </li>
      </nav>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>