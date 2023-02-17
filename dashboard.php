
<!-- Restringe a entrada na página a utilizadores registados -->
<?php include("api/checkSession.php") ?>

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
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <!-- CSS -->
   <link rel="stylesheet" href="src/css/universal.css" />
   <link rel="stylesheet" href="src/css/Dashboard.css" />
   <link rel="stylesheet" href="src/css/components/navbar/navbar-dark.css" />
   <!-- Titulo -->
   <title>Home</title>
   <!-- FavIcon -->
   <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
   <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
   <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
   <link rel="manifest" href="/site.webmanifest">
</head>

<body>
   <div class="container-fluid">
      <div class="row">
         <div class="col-7">
            <h1 class="main-title">Bem-Vindo, <?php echo $_SESSION['user'] ?></h1>
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
      <div class="row">
         <div class="col-sm-12 g-3">
            <div class="card p-3 justify-content-center card-weather">
               <a class="weatherwidget-io" href="https://forecast7.com/en/39d75n8d81/leiria/" data-label_1="LEIRIA" data-label_2="WEATHER" data-font="Roboto" data-icons="Climacons Animated" data-mode="Current" data-theme="pure">LEIRIA WEATHER</a>
               <script>
                  ! function(d, s, id) {
                     var js, fjs = d.getElementsByTagName(s)[0];
                     if (!d.getElementById(id)) {
                        js = d.createElement(s);
                        js.id = id;
                        js.src = 'https://weatherwidget.io/js/widget.min.js';
                        fjs.parentNode.insertBefore(js, fjs);
                     }
                  }(document, 'script', 'weatherwidget-io-js');
               </script>
            </div>
         </div>
         <div class="col-sm-6 g-3">
            <div class="card p-3 justify-content-center card-waze">
               <iframe src="https://embed.waze.com/iframe?zoom=15&lat=39.735409&lon=-8.821077&ct=livemap" width="100%" height="100%" allowfullscreen></iframe>
            </div>
         </div>
         <div class="col-sm-6 g-3">
            <div class="card p-3 card-spotify">
               <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/4uND8NFPjHu6VfQY23bKsT?utm_source=generator&theme=0" 
                  width="100%" height="200" frameBorder="0" 
                  allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>
            </div>
            <div class="card p-3 card-news">
               <iframe width="100%" height="100%" src="https://rss.app/embed/v1/carousel/tt6wODqismrXu25P" frameborder="0"></iframe>
            </div>
            <footer>
               <nav class="navbar fixed-bottom">
                  <div class="container-fluid justify-content-center">
                     <ul class="nav nav-justified">
                        <li class="nav-item active">
                           <a class="nav-link active" aria-current="page" href="dashboard.html">
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
                           <a class="nav-link" href="historico.php">
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