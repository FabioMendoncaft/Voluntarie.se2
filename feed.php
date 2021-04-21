<?php

session_start();
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
    header('Location: index.php');
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voluntarie.se | Feed</title>
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="bootstrap-5.0.0-beta2-dist/bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/feed.css">
</head>

<body>
    <nav class="navbar fixed-top navbar navbar-expand-lg navbar-light bg-light" id="navTop">
        <div class="container-fluid">
            <a href="/"><img src="img/logo.png" alt="logo" style="width: 130px; margin-top: -6px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #707071;">
                            <span class="material-icons" style="margin-right: 4px;float: left;">account_circle</span>
                            <label style="margin-right: 1px;">John Galt</label>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="perfil.php">Meu perfil</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="index.php">Sair</a></li>
                        </ul>
                    </li>

                </div>
                <div class="form-inline my-2 my-lg-0">
                    <a href="criar-acao.php"><button class="btn btn-light buttonNewAction corBotao" type="submit"><i class="fas fa-plus"></i> Criar ação</button></a>
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
            <a href="#">
                <span id="feed" class="material-icons">home</span>
            </a>

           <a href="criar-acao.php">
                <span class="material-icons">add_circle</span>
            </a>

            <a href="minhas-acoes.php">
                <span class="material-icons">collections</span>
            </a>
            <div>
                <a href="perfil.php">
                    <span id="perfil" class="material-icons">person</span>
                </a>
    </nav>
    <!--FIM!! Navbar para Mobile(Barra inferior)-->

    <div class="perfilFiltro">
        <div class="perfil">
            <div id="topPerfil"></div>
            <div id="blocoFotoPerfil">
                <img src="img/íconePerfil.jpg" alt="" id="imagemPerfil">
            </div>
            <div class="dadosPerfil">
                <h1><strong>John Galt</strong></h1>
                <a href="perfil.php" class="btn btn-light corBotao">Meu perfil</a>
                <a href="minhas-acoes.php" class="btn btn-light btn2">Minhas ações</a>
            </div>
        </div>

        <div class="filtro">
            <div id="blocoFiltro">
                <h1 class="tituloFiltro">Filtro de pesquisa <i class="fas fa-filter"></i></h1>
                <p>Cidade:</p>
                <input type="text" id="cidade">
                <p>Estado:</p>
                <input type="text" id="estado">
                <p>Categoria:</p>
                <select name="categoria">
                    <option disabled="disabled" selected="selected">-- Selecione uma opção</option>
                    <option>Visitações</option>
                    <option>Doação de sangue</option>
                    <option>Doação de suprimentos</option>
                    <option>Distribuição suprimentos</option>
                    <option>Adoção de animais</option>
                    <option>Passeio com animais</option>
                </select>
                <a href="#" class="btn btn-light corBotao">Aplicar filtros</a>
            </div>
        </div>
    </div>

    <div class="acoes">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <img src="img/acaoSocial2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <a href="#" class="btn btn-light corBotao"><i class="fas fa-users"></i> Participar</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="img/acaoSocial2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a short card.</p>
                        <a href="#" class="btn btn-light corBotao"><i class="fas fa-users"></i> Participar</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="img/acaoSocial2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.
                        </p>
                        <a href="#" class="btn btn-light corBotao"><i class="fas fa-users"></i> Participar</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="img/acaoSocial2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <a href="#" class="btn btn-light corBotao"><i class="fas fa-users"></i> Participar</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="img/acaoSocial2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <a href="#" class="btn btn-light corBotao"><i class="fas fa-users"></i> Participar</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="img/acaoSocial2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <a href="#" class="btn btn-light botaoAcoesFeed corBotao"><i class="fas fa-users"></i> Participar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



    <script type="text/javascript" src="js/jquery-3.5.1.min.js">
    </script>
    <script type="text/javascript" src="js/bootstrap.min.js">
    </script>
</body>

</html>