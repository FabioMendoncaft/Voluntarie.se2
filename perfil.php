<?php

  session_start();
  if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM'){
    header('Location: index.php');
  }


?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Voluntarie.se | Perfil</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="bootstrap-5.0.0-beta2-dist/bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css" rel="stylesheet"
    type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
    crossorigin="anonymous" />
  <link rel="stylesheet" href="css/perfil.css">
  <script type="text/javascript" src="js/jquery-3.5.1.min.js"> </script>
  <script type="text/javascript" src="js/bootstrap.min.js"> </script>
  <script type="text/javascript" src="js/jquery.validate.min.js"> </script>
  <script type="text/javascript" src="js/additional-methods.min.js"> </script>
  <script type="text/javascript" src="js/localization/messages_pt_BR.js"></script>
  <script type="text/javascript" src="js/jquery.mask.min.js"></script>
</head>

<body>
  <nav class="navbar fixed-top navbar navbar-expand-lg navbar-light bg-light" id="navTop">
    <div class="container-fluid">
      <a href="/"><img src="img/logo.png" alt="logo" style="width: 130px; margin-top: -6px;"></a>
      <!--<a class="navbar-brand" href="#" id="logoFeed">Voluntarie<strong style="color:#f83600;">.se</strong></a>-->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="feed.php">Página inicial</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        <div>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false" style="color: #707071;">
              <span class="material-icons" style="margin-right: 4px;float: left;">account_circle</span>
              <label style="margin-right: 1px;">John Galt</label>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Meu perfil</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="index.php">Sair</a></li>
            </ul>
          </li>
        </div>
        <div class="form-inline my-2 my-lg-0">
          <a href="criar-acao.php"><button class="btn btn-light buttonNewAction corBotao" type="submit"><i
                class="fas fa-plus"></i> Criar ação</button></a>
        </div>
      </div>
    </div>
  </nav>

  <!--Navbar para Mobile(Barra Superior)-->
  <nav class="fixed-top navbar navbar-expand-lg navbar-light bg-light" id="navTopMobile">
    <div class="container-fluid">
      <a href="/"><img src="img/logo.png" alt="logo" id="imagem"></a>
    </div>
  </nav>
  <!--FIM!!  Navbar para Mobile(Barra Superior)-->

  <!--Navbar para Mobile(Barra inferior)-->
  <nav class="fixed-bottom navbar navbar-expand-lg navbar-light bg-light" id="navBotoomMobile">
    <div class="container-fluid">
      <a href="feed.php">
        <span id="feed" class="material-icons">home</span>
      </a>

      <a href="">
        <span class="material-icons">search</span>
      </a>

      <a href="criar-acao.php">
        <span class="material-icons">add_circle</span>
      </a>

      <a href="minhas-acoes.php">
        <span class="material-icons">collections</span>
      </a>
      <div>
        <a href="#">
          <span id="perfil" class="material-icons">person</span>
        </a>
  </nav>
  <!--FIM!! Navbar para Mobile(Barra inferior)-->



  <div style="width: 100%; height: 100%; margin-top: 60px; margin-left: 10px; font-size: 20px;"></div>
  Em desenvolvimento...
  </div>
</body>

</html>