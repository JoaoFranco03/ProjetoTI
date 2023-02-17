<!-- Restringe a entrada na página a utilizadores Administradores -->
<?php include("api/checkAdmin.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Safari 15 Tab UI Color -->
   <meta name="theme-color" content="#F8F9FA">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- icons -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js" crossorigin="anonymous"></script>
   <script src="https://kit.fontawesome.com/2cc7268e45.js" crossorigin="anonymous"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="src/css/historico.css" />
   <link rel="stylesheet" href="src/css/universal.css" />
   <link rel="stylesheet" href="src/css/components/navbar/navbar-dark.css" />
   <!-- Gráficos -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
   <title>Histórico</title>
   <script src="http://code.jquery.com/jquery-latest.js"></script>
   <script>
      $(document).ready(function() {
         $("#table_refresh").load("api/makeTable.php");
         setInterval(function() {
            $("#table_refresh").load("api/makeTable.php");
         }, 1000);
      });
   </script>
</head>

<body class="img-fluid" style="background-image: url('../ProjetoTI/src/img/rooms/home.jpg');">
   <div class="container-fluid">
      <div class="row">
         <div class="col-7">
            <h1 class="room">Hístorico</h1>
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
      <div class="row gx-3">
         <div class="col-sm-12 col-md-6">
            <div class="card-historico card text-dark bg-light mb-3">
               <div class="card-body">
                  <h5 class="card-title">Número de Dispositivos por Divisão</h5>
                  <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
                  <script>
                     var xValues = [<?php include("api/getRooms.php") ?>];
                     var yValues = [<?php include("api/getNumberDevicesRooms.php") ?>];
                     var barColors = ["red", "green", "blue", "orange", "brown"];

                     new Chart("myChart", {
                        type: "bar",
                        data: {
                           labels: xValues,
                           datasets: [{
                              backgroundColor: barColors,
                              data: yValues
                           }]
                        },
                        options: {
                           title: {
                              display: false,
                           },
                           legend: {
                              display: false,
                           },
                        }
                     });
                  </script>
               </div>
            </div>
         </div>
         <div class="col-sm-12 col-md-6">
            <div class="card-historico card text-dark bg-light mb-3">
               <div class="card-body">
                  <h5 class="card-title">Numero de Dispositivos por Categoria</h5>
                  <canvas id="myChart2" style="width:100%;max-width:700px"></canvas>
                  <script>
                     var xValues = [<?php include("api/getCategories.php") ?>];
                     var yValues = [<?php include("api/getNumberDevicesCategories.php") ?>];
                     var barColors = [
                        "#66B2FF",
                        "#0080FF",
                        "#000066",
                        "#99004C",
                        "#FF007F",
                        "#FF6666",
                        "#CC0000"
                     ];

                     new Chart("myChart2", {
                        type: "pie",
                        data: {
                           labels: xValues,
                           datasets: [{
                              backgroundColor: barColors,
                              data: yValues
                           }]
                        },
                        options: {
                           title: {
                              display: false,
                           },
                           legend: {
                              position: 'bottom'
                           }
                        }
                     });
                  </script>
               </div>
            </div>
         </div>
         <div class="col-xs-12">
            <div class="card-historico card text-dark bg-light mb-3">
               <div class="card-body">
                  <h5 class="card-title">Histórico de Dispositivos e Atuadores</h5>
                  <div class="table-responsive">
                     <table class="table">
                        <thead>
                           <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Nome</th>
                              <th scope="col">Tipo de Dispositivo/Sensor</th>
                              <th scope="col">Divisão</th>
                              <th scope="col">Estado</th>
                              <th scope="col">Valor</th>
                              <th scope="col">Dia</th>
                              <th scope="col">Hora</th>
                           </tr>
                        </thead>
                        <tbody id="table_refresh">
                           <?php include("api/makeTable.php") ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
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
                  <!-- Botão Dropdown -->
                  <div class="nav-item dropup">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-house-chimney-window"></i><br class="d-none d-md-inline d-none">
                        <div class="text-navbar d-inline d-none d-md-inline d-none">Divisões</div>
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
                     <a class="nav-link active" href="historico.php">
                        <i class="fa-solid fa-clock-rotate-left"></i><br>
                        <div class="text-navbar d-inline d-none d-md-block d-none">Histórico</div>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="seguranca.php">
                        <i class="fa-solid fa-shield-halved"></i><br>
                        <div class="text-navbar d-inline d-none d-md-block d-none">Segurança</div>
                     </a>
                  </li>
         </nav>
      </footer>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>