<!-- Restringe a entrada na página a utilizadores registados -->
<?php include("api/checkSession.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Cor da Tab do Chrome Mobile / Safari 15 -->
   <meta name="theme-color" content="#F8F9FA">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Script referente aos Charts -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js" crossorigin="anonymous"></script>
   <!-- Script referente aos Icons da Navbar -->
   <script src="https://kit.fontawesome.com/2cc7268e45.js" crossorigin="anonymous"></script>
   <!-- Link necessário para o bom funcionamento do Bootstrap-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
   integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <!-- CSS referentes à NavBar (Paleta Escura) -->
   <link rel="stylesheet" href="src/css/components/navbar/navbar-dark.css" />
   <!-- CSS universal a todas as Divisoes -->
   <link rel="stylesheet" href="src/css/rooms.css" />
   <!-- CSS referentes à NavBar (Paleta Escura) -->
   <link rel="stylesheet" href="src/css/universal.css" />
   <!-- CSS referentes às cores de Status dos Dispositivos -->
   <link rel="stylesheet" href="src/css/components/status/status.css" />
   <!-- Script necessário para o bom funcionamento dos Gráficos -->
   <script src="src/js/charts.js"></script>
   <!-- Titulo que aparece na Tab do Browser -->
   <title>Casa_de_Banho</title>
   <script src="http://code.jquery.com/jquery-latest.js"></script>
   <script>
      //Script para mostrar / atualizar a informação referente aos Sensores sem dar Refresh à Pagina
      $(document).ready(function() {
         $("#sensors_refresh").load("api/getSensors.php?divisaoPage=Casa_de_Banho");
         setInterval(function() {
            $("#sensors_refresh").load("api/getSensors.php?divisaoPage=Casa_de_Banho");
         }, 1000);
      });

      //Script para atualizar o estado dos sensores dependendo do nível da bateria sem dar Refresh à Pagina
      //Script para atualizar o estado dos dispositivos dependendo do valor sem dar Refresh à Pagina
      $(document).ready(function() {
         $("#values_check").load("api/updateStatus.php");
         setInterval(function() {
            $("#values_check").load("api/updateStatus.php");
         }, 1000);
      });

      //Script para mostrar / atualizar a informação referente aos Dispositivos sem dar Refresh à Pagina
      $(document).ready(function() {
         $("#devices_refresh").load("api/getDevices.php?divisaoPage=Casa_de_Banho");
         setInterval(function() {
            $("#devices_refresh").load("api/getDevices.php?divisaoPage=Casa_de_Banho");
         }, 1000);
      });

      //Script para enviar informação referente ao ID do Dispositivo para o Modal para posterior alteração na Base de Dados
      $(document).on("click", ".sendData", function(e) {
         e.preventDefault();
         var _self = $(this);
         var myId = _self.data('id');
         $("#idID").val(myId);
         var xmlHttp = new XMLHttpRequest();
         xmlHttp.open("GET", `http://localhost:8888/ProjetoTI/api/ciscoDevicesLink.php?id=${myId}`, false); // false for synchronous request
         xmlHttp.send(null);
         document.getElementById("idRange").value = parseInt(xmlHttp.responseText);
         xmlHttp.open("GET", `http://localhost:8888/ProjetoTI/api/getRangeValue.php?id=${myId}&max=1`, false); // GetMaxValue
         xmlHttp.send(null);
         if (parseInt(xmlHttp.responseText) > 30 )
            document.getElementById("rangeLabel").innerHTML = "Volume (0 - 100):";
         if (parseInt(xmlHttp.responseText) == 2)
            document.getElementById("rangeLabel").innerHTML = "Estado (0 - Off / 1 - Velocidade Normal / 2 - Velocidade Máxima):";
         if (parseInt(xmlHttp.responseText) == 1)
            document.getElementById("rangeLabel").innerHTML = "Estado (0 - Off / 1 - On):";
         document.getElementById("idRange").max = parseInt(xmlHttp.responseText);
         xmlHttp.open("GET", `http://localhost:8888/ProjetoTI/api/getRangeValue.php?id=${myId}&max=0`, false); // GetMaxValue
         xmlHttp.send(null);
         document.getElementById("idRange").min = parseInt(xmlHttp.responseText);
         
         $(_self.attr('href')).modal('show');
      });
   </script>
   <script>

   </script>
   <!-- CSS que apenas se aplicam ao Casa_de_Banho -->
   <!-- (Nota: Como a CSS especifica para o Casa_de_Banho é apenas a parte em baixo que se refere ao body decidimos usar CSS Internas 
   devido a não haver necessidade de criar um novo ficheiro para tão pouco código) -->
   <style>
      body {
         background-image: url("./src/img/rooms/bathroom.jpg");
         background-position: center;
         background-repeat: no-repeat;
         background-size: cover;
         background-attachment: fixed;
      }
   </style>
</head>

<body>
   <!-- DIV necessária para o Script verificar o estado -->
   <div id="values_check"></div>
   <div class="container-fluid">
      <!-- Secção - Boas Vindas -->
      <div class="row">
         <div class="col-7">
            <h1 class="room">Casa_de_Banho</h1>
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
      <!-- Secção - Sensores -->
      <div class="row">
         <div class="scroll-x" id="sensors_refresh">
            <?php
            include("api/getSensors.php");
            ?>
         </div>
      </div>
      <!-- Secção - Dispositivos -->
      <div class="row">
         <h2 class="dispositivos">Dispositivos</h2>
         <div class="row g-2">
            <div class="row g-2" id="devices_refresh"></div>
         </div>
      </div>
      <!-- Footer onde está contido a navbar para navegar pelas diferentes páginas -->
      <footer>
         <nav class="navbar fixed-bottom">
            <div class="container-fluid justify-content-center">
               <ul class="nav nav-justified">
                  <li class="nav-item active">
                     <a class="nav-link" aria-current="page" href="dashboard.php">
                        <i class="fa-solid fa-house-chimney"></i><br>
                        <div class="text-navbar d-inline d-none d-md-block d-none">Home</div>
                     </a>
                  </li>
                  <!-- Botão Dropdown com as várias divisões da casa -->
                  <div class="nav-item dropup">
                     <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-house-chimney-window"></i><br class="d-none d-md-inline d-none">
                        <div class="text-navbar d-inline d-none d-md-inline d-none">Divisões</div>
                     </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="livingroom.php"><i class="fa-solid fa-couch"></i>&nbsp&nbspSala</a></li>
                        <li><a class="dropdown-item" href="bedroom.php"><i class="fa-solid fa-bed"></i>&nbsp&nbspQuarto</a></li>
                        <li><a class="dropdown-item" href="kitchen.php"><i class="fa-solid fa-kitchen-set"></i>&nbsp&nbspCasa_de_Banho</a></li>
                        <li><a class="dropdown-item" href="bathroom.php"><i class="fa-solid fa-toilet"></i>&nbsp&nbspCasa de Banho</a></li>
                        <li><a class="dropdown-item" href="garage.php"><i class="fa-solid fa-warehouse"></i>&nbsp&nbspGaragem</a></li>
                        <li><a class="dropdown-item" href="garden.php"><i class="fa-solid fa-faucet-drip"></i>&nbsp&nbspJardim</a></li>
                     </ul>
                  </div>
                  <!-- Botão de acesso à página do histórico -->
                  <li class="nav-item">
                     <a class="nav-link" href="historico.php">
                        <i class="fa-solid fa-clock-rotate-left"></i><br>
                        <div class="text-navbar d-inline d-none d-md-block d-none">Histórico</div>
                     </a>
                  </li>
                  <!-- Botão de acesso à página da segurança da casa -->
                  <li class="nav-item">
                     <a class="nav-link" href="seguranca.php">
                        <i class="fa-solid fa-shield-halved"></i><br>
                        <div class="text-navbar d-inline d-none d-md-block d-none">Segurança</div>
                     </a>
                  </li>
         </nav>
      </footer>
      <!-- Modal Luzes-->
      <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-body">
                  <form action="api/sendModal.php" method="POST">
                     <div class="form-group">
                        <label id="rangeLabel" for="idRange" style="width: 100%;" class="form-label"></label>
                        <input type="range" name="idRange" class="form-range" min="0" max="100" id="idRange" value="">
                        <input type="hidden" name="idID" id="idID" />
                        <input type="hidden" name="divisaoPage" id="divisaoPage" value="Casa_de_Banho" />
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                        <button name="submit" type="submit" class="btn btn-primary">Guardar Alterações</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- Javascript incluido no Bootstrap -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>