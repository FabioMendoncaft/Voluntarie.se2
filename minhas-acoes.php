<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voluntarie.se | Minhas-ações</title>
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="bootstrap-5.0.0-beta2-dist/bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <link rel="stylesheet" href="css/minhas-acoes.css">
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
    </script>

</head>

<?php

session_start();
if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM'){
header('Location: index.php');
}

$acao = 'recuperar';
require 'php/acoes-controller.php';

?>

    <body>
        <!-- NavBar Topo(PC) -->
        <nav class="navbar fixed-top navbar navbar-expand-lg navbar-light bg-light" id="navTop">
            <div class="container-fluid">
                <a href="feed.php"><img src="img/logo.png" alt="logo" id="imagemLogo"></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                    <div>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="material-icons">account_circle</span>
                                <label>John Galt</label>
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
                        <a href="criar-acao.php"><button class="btn btn-light buttonNewAction corBotao" type="submit"><i
                            class="fas fa-plus"></i> Criar ação</button></a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- (FIM)NavBar Topo(PC) -->

        <!--####################################################################################################################-->

        <!-- NavBar MOBILE -->
        <!-- Navbar para Mobile(Barra Superior) -->
        <nav class="fixed-top navbar navbar-expand-lg navbar-light bg-light" id="navTopMobile">
            <div class="container-fluid">
                <a href="#"><img src="img/logo.png" alt="logo" id="imagem"></a>
            </div>
        </nav>
        <!-- (FIM)Navbar para Mobile(Barra Superior)-->

        <!-- Navbar para Mobile(Barra inferior) -->
        <nav class="fixed-bottom navbar navbar-expand-lg navbar-light bg-light" id="navBotoomMobile">
            <div class="container-fluid">
                <a href="feed.php">
                    <span id="feed" class="material-icons">home</span>
                </a>

                <a href="criar-acao.php">
                    <span class="material-icons">add_circle</span>
                </a>

                <a href="#">
                    <span id="minhasAcoes" class="material-icons">collections</span>
                </a>
                <div>
                    <a href="perfil.php">
                        <span id="perfil" class="material-icons">person</span>
                    </a>
        </nav>
        <!-- (FIM)Navbar para Mobile(Barra inferior) -->

        <!--####################################################################################################################-->

        <!-- Lateral - Dados do usuário(DIREITA) -->
        <div class="perfilFiltro">
            <div class="perfil">
                <div id="topPerfil"></div>
                <div id="blocoFotoPerfil">
                    <img src="img/íconePerfil.jpg" alt="" class="imagemPerfil">
                </div>
                <div class="dadosPerfil">
                    <h1><strong>John Galt</strong></h1>
                    <a href="perfil.php" class="btn btn-light corBotao">Meu perfil</a>
                </div>
            </div>

            <div class="filtro">

            </div>
        </div>
        <!-- (FIM)lateral - Dados do usuário(DIREITA) -->

        <!--####################################################################################################################-->

        <!-- Ações do usuário -->
        <div class="minhasAcoes">
            <div id="tituloMobile">
                <h3>Minhas ações</h3>
            </div>
            <div id="acoess" class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach($minha_acao as $indice => $acoes) { ?>
                <div class="col " id="">
                    <div class="card h-100 ">
                        <img src="img/acaoSocial2.jpg " class="card-img-top " alt="... ">
                        <div class="card-body d-flex flex-column align-items-left">
                            <h5 class="card-tite ">
                                <?= $acoes->titulo ?>
                            </h5>
                            <p class="card-text ">
                                <?= $acoes->descricao ?>
                            </p>
                            <div class="botoes-Cards mt-auto">
                                <a href="#" class="btn btn-light botaoAcoesFeed corBotao editBtn">Alterar</a>
                                <a href="#" class="btn btn-light botaoAcoesFeed corBotao">Excluir</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        </div>
        <!--(FIM)Ações do usuário-->

        <!--######################################################################################################################-->
        
        <!-- MODAL EDITAR -->
        <div class="modal fade" tabindex="-1" id="modalEdit" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" id="modalEditar">
                    <div class="acoes">
                        <div class="blocoCadastro" id="criarAcao">

                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                            <!-- AQUI ENTRA O CÓDIGO EM PHP (NESTE FORM) -->
                            
                            <form action="">
                                <div id="titulooo">
                                    <p>Título:</p>
                                    <input type="text" name="titulo" id="titulo">
                                </div>

                                <div id="ceppp">
                                    <p>Cep:</p>
                                    <input type="text " id="cep" placeholder=" Cep " name="cep">
                                    <a href="# " class="btn btn-light corBotao " id="pesquisar" onclick="endereco()">Pesquisar CEP</a>
                                </div>

                                <p>Descrição:</p>
                                <textarea name="descricao" id="descricao" rows="2"></textarea>

                                <div id="quadrado">
                                    <legend>Endereço:</legend>
                                    <input type="text" id="logradouro" placeholder=" Logradouro " name="logradouro">
                                    <input type="text" id="complemento" placeholder=" Complemento " name="complemento">
                                    <input type="text" id="bairro" placeholder=" Bairro " name="bairro ">
                                    <input type="text" id="localidade" placeholder=" Cidade ">
                                    <input type="text" id="uf" placeholder="UF" name="uf">
                                </div>

                                <div id="dataa">
                                    <p>Data:</p>
                                    <input type="date" name="data">
                                </div>

                                <div id="categoriaa">
                                    <p>Categoria:</p>
                                    <select name="categoria">
                                        <option disabled="disabled"selected="selected">-- Selecione uma opção</option>
                                        <option>Visitações</option>
                                        <option>Doação de sangue</option>
                                        <option>Doação de suprimentos</option>
                                        <option>Distribuição suprimentos</option>
                                        <option>Adoção de animais</option>
                                        <option>Passeio com animais</option>
                                    </select>
                                </div>

                                <p>Imagem:</p>
                                <form method="POST" action="" enctype="multipart/form-data">
                                    <input type="file" name="imagem" id="escolherImagem" onchange="previewImagem()">
                                </form>


                                <a href="" type="submit" class="btn btn-light corBotao" id="botaoCriar">Salvar</a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- (FIM) MODAL EDITAR -->

        <!--######################################################################################################################-->




        <script src="JavaScript/minhas-acoes.js"></script>

        <script>
            $(document).ready(function() {
                $('.editBtn').on('click', function() {
                    $('#modalEdit').modal('show');
                })
            })
        </script>
    </body>

</html>