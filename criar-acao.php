<?php

session_start();
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
    header('Location: index.php');
}


?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voluntarie.se | Criar-ação</title>
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="bootstrap-5.0.0-beta2-dist/bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/criar-acao.css">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js">
    </script>
    <script type="text/javascript" src="js/bootstrap.min.js">
    </script>
    <script type="text/javascript" src="js/jquery.validate.min.js">
    </script>
    <script type="text/javascript" src="js/additional-methods.min.js">
    </script>
    <script type="text/javascript" src="js/localization/messages_pt_BR.js"></script>
    <script type="text/javascript" src="js/jquery.mask.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#cep").mask("00000-000")
        })

        $(document).ready(function() {
            $("#criarAcao").validate({
                rules: {
                    titulo: {
                        required: true,
                    },
                    descricao: {
                        required: true,
                    },
                    data: {
                        required: true,
                    }
                },
            })
        })
        $(document).ready(function() {
            $("#quadrado").validate({
                rules: {
                    logradouro: {
                        required: true,
                    },
                    bairro: {
                        required: true,
                    },
                    cidade: {
                        required: true,
                    },
                    uf: {
                        required: true,
                    },
                    categoria: {
                        required: true,
                    }
                },
            })
        })
    </script>

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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
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
            <a href="feed.php">
                <span id="feed" class="material-icons">home</span>
            </a>

           <a href="#">
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
                <img src="img/íconePerfil.jpg" alt="" class="imagemPerfil">
            </div>
            <div class="dadosPerfil">
                <h1><strong>John Galt</strong></h1>
                <a href="perfil.php" class="btn btn-light corBotao">Meu perfil</a>
                <a href="minhas-acoes.php" class="btn btn-light btn2">Minhas ações</a>
            </div>
        </div>

        <div class="filtro">

        </div>
    </div>

    <div class="acoes">
        <div class="blocoCadastro" id="criarAcao">

            <div id="tituloMobile">
                <h3>Criar ação</h3>
            </div>
        <form method="post" action="php/acoes-controller.php?acao=criar">
            <p>Título:</p>
            <input type="text" name="titulo" id="titulo">

            <p>Descrição:</p>
            <textarea name="descricao" id="descricao" rows="4"></textarea>

            <div id="dataa">
                <p>Data:</p>
                <input type="date" name="data">
            </div>

            <div id="categoriaa">
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
            </div>

            <div id="quadrado">
                <legend>Endereço:</legend>
                <input type="text" id="cep" placeholder=" Cep" name="cep">
                <a href="#" class="btn btn-light corBotao" id="obterEndereco" onclick="endereco()">Obter endereço</a>
                <input type="text" id="logradouro" placeholder=" Logradouro" name="logradouro">
                <input type="text" id="complemento" placeholder=" Complemento" name="complemento">
                <input type="text" id="bairro" placeholder=" Bairro" name="bairro">
                <input type="text" id="localidade" placeholder=" Cidade" name="cidade">
                <input type="text" id="uf" placeholder=" UF" name="uf">
            </div>

            <p>Imagem:</p>
       <!--     <form method="POST" action="" enctype="multipart/form-data"> -->
                <input type="file" name="imagem" id="escolherImagem" onchange="previewImagem()">
                <img name="imagem" src="" alt="" id="imagem">
           <!-- </form> -->

            <button type="submit" class="btn btn-light corBotao" id="botaoCriar">Criar ação</button>
        </form>
        </div>
    </div>


    <script src="JavaScript/criar-acao.js"></script>
</body>

</html>