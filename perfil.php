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
        <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="bootstrap-5.0.0-beta2-dist/bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
        <link rel="stylesheet" href="css/perfil.css">
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
    </head>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#telefonee").mask("(00)00000-0000")
        })
        $(document).ready(function() {
            $("#data").mask("00/00/0000")
        })

        $(document).ready(function() {
            $("#cadastro").validate({
                rules: {
                    nome: {
                        maxlength: 100,
                        minlength: 10,
                        minWords: 2
                    },
                    senhaAtual: {
                        rangelength: [6, 10]
                    },
                    senhaNova: {
                        rangelength: [6, 10]
                    },
                    confirmar: {

                        equalTo: "#senhaNova"
                    },
                },
            })
        })
    </script>

    <body>
        <nav class="navbar fixed-top navbar navbar-expand-lg navbar-light bg-light" id="navTop">
            <div class="container-fluid">
                <a href="/"><img src="img/logo.png" alt="logo" style="width: 130px; margin-top: -6px;"></a>
                <!--<a class="navbar-brand" href="#" id="logoFeed">Voluntarie<strong style="color:#f83600;">.se</strong></a>-->
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

        <div class="blocoPerfil">
            <div id="topPerfil"></div>

            <div id="blocoFotoPerfil">
                <img src="img/íconePerfil.jpg" alt="" id="imagemPerfil">
                <button id="editarImagem" class="ativarModall"><span class="material-icons">camera_alt</span></button>
            </div>

            <h1 id="nome">John Galt</h1>

            <div id="blocoDados">
                <p class="dados">E-mail:
                    <p id="email">fabio.mendonca.f@gmail.com</p>
                </p>

                <p class="dados">Telefone:
                    <p id="telefone">(00)00000-0000</p>
                </p>

                <p class="dados">Data de nascimento:
                    <p id="dNascimento">00/00/0000</p>
                </p>

                <p class="dados">Sexo:
                    <p id="sexo">Masculino</p>
                </p>
            </div>

            <button type="submit" class="btn btn-light corBotao ativarModal" id="editarDados">Editar dados</button>

        </div>


        <!--(MODAL)Tela de editar dados-->
        <div id="modall-editarDados" class="modall-editarDados">
            <div class="modalEditar">
                <button class="close">X</button>
                <form class="form" method="post" id="cadastro">
                    <div class="card1">


                        <div class="card1-group">
                            <label>Nome</label>
                            <input type="text" name="nome" id="nome" placeholder="Digite seu novo nome">
                        </div>


                        <div class="card1-group">
                            <label>Telefone</label>
                            <input type="text" name="telefone" id="telefonee" placeholder="Digite seu novo telefone">
                        </div>

                        <div class="card1-group">
                            <label>Senha atual</label>
                            <input type="password" name="senha" id="senhaAtual" placeholder="Digite sua senha">
                        </div>

                        <div class="card1-group">
                            <label>Nova senha</label>
                            <input type="password" name="senha" id="senhaNova" placeholder="Digite a nova senha">
                        </div>

                        <div class="card1-group">
                            <label>Confirmar</label>
                            <input type="password" name="confirmar" id="confirmar" placeholder="Confirmar nova senha">
                        </div>

                        <div class="card1-group">
                            <label>Data de nascimento</label>
                            <input type="text" name="data" id="data" placeholder="Digite sua data de nascimento">
                        </div>

                        <div class="sexo">
                            <label>Sexo</label>
                            <select name="sexo" class="opcoes">
                                <option disabled="disabled" selected="selected">-- Selecione uma opção</option>
                                <option>Masculino</option>
                                <option>Feminino</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-light corBotao botaoEditarDados " id="Alterar">ALTERAR</button>

                    </div>
                </form>
            </div>
        </div>

        <!--(MODAL)Tela de editar foto-->

        <div id="modall-editarImagem" class="modall-editarImagem">
            <div class="modall-editarImg">
                <button class="close">X</button>

                <div class="card1">
                    <form method="POST" class="form" action="#" id="esqueciSenhaa" enctype="multipart/form-data">

                        <p id="tituloEditarFoto">Foto do perfil</p>

                        <input type="file" name="imageee" id="imageee" onchange="previewImagem()"><br><br>

                        <img name="imagee" id="imagee">
                    </form>

                    <button type="submit" class="btn btn-light corBotao botaoEditarFoto" id="salvarFoto">SALVAR</button>
                </div>
            </div>
        </div>
        </header>
        </div>




        <script src="JavaScript/perfil.js"></script>



    </body>

    </html>