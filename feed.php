
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

<?php
session_start();
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
    header('Location: index.php');
}

$acao = 'feed';
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
                        <a href="criar-acao.php"><button class="btn btn-light buttonNewAction corBotao" type="submit"><i class="fas fa-plus"></i> Criar ação</button></a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- (FIM)NavBar Topo(PC) -->

        <!--####################################################################################################################-->

        <!-- NavBar MOBILE -->
        <!-- NavBar para Mobile(Barra Superior) -->
        <nav class="fixed-top navbar navbar-expand-lg navbar-light bg-light" id="navTopMobile">
            <div class="container-fluid">
                <a href="#"><img src="img/logo.png" alt="logo" id="imagem"></a>
            </div>
        </nav>
        <!-- (FIM)NavBar para Mobile(Barra Superior) -->

        <!-- NavBar para Mobile(Barra inferior) -->
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

                <a href="perfil.php">
                    <span id="perfil" class="material-icons">person</span>
                </a>
            </div>
        </nav>
        <!-- (FIM)NavBar para Mobile(Barra inferior) -->

        <!--####################################################################################################################-->

        <!-- Lateral - Dados do usuário e filtro de pesquisa(ESQUERDA) -->
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
                    <select name="estado">
                        <option disabled="disabled" selected="selected">-- Selecione uma opção</option>
                        <option>AL</option>
                        <option>AM</option>
                        <option>BA</option>
                        <option>CE</option>
                        <option>PB</option>
                        <option>PE</option>
                    </select>
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
                    <a href="#" name="btnFiltro" id="btnFiltro" class="btn btn-light corBotao" onclick="filtraAcao();">Aplicar filtros</a>
                </div>
            </div>
        </div>
        <!-- (FIM)lateral - Dados do usuário e filtro de pesquisa(ESQUERDA) -->

        <!--####################################################################################################################-->

        <!-- Ações Criadas pelos usuários (DIREITA) -->
        <div class="acoes">
         <!--   
            <div style="margin-bottom: 15px;" class="row row-cols-1 row-cols-md-3 g-4"> 
                <?php// foreach($minha_acao as $indice => $acoes) { ?>
                <div class="col">
                    <div class="card h-100">
                        <button style="border: 0px;" class="editBtn"><img src="img/acaoSocial2.jpg" class="card-img-top" alt="..."></button>
                        <div class="card-body d-flex flex-column align-items-left">
                        <button style="text-align: left; border: 0px; background: transparent;" class="editBtn"><h5 class="card-title"><?= $acoes->titulo ?></h5>
                            <p class="card-text"><?= $acoes->descricao ?></p>
                            </p id="dataCard" name="dataCard"><?= $acoes->data_evento ?></p></button>
                            <a href="#" class="btn btn-light corBotao mt-auto ptr">Participar</a>
                        </div>
                    </div>
                    
                </div>
                <?php //} ?>
            </div>
            -->
        </div>
        </div>
        <!-- (FIM)Ações Criadas pelos usuários (DIREITA) -->

        <!--####################################################################################################################-->
        
        <!-- MODAL VER DETALHES DA AÇÃO -->
        <div class="modal fade" tabindex="-1" id="modalEdit" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <!-- AQUI ENTRA O CÓDIGO EM PHP (NESTE FORM) -->
                    <form action="">
                        <div class="col">
                            <div class="card h-100">
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <img src="img/acaoSocial2.jpg" class="card-img-top" alt="...">
                                <div class="card-body d-flex flex-column align-items-left modalAcoes">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    
                                    <label>
                                        <p>Data: </p>
                                        <p id="dataModal" name="dataModal">00/00/0000</p>
                                    </label> 
                                    
                                    <label>
                                        <p>Endereço: </p>
                                        <p id="cepModal" name="cepModal"> 00000-000</p> 
                                            <p>, </p> 
                                        <p id="ruaModal" name="ruaModal"> Tabelião João lago 
                                            <p>, </p> 
                                        <p id="numeroModal" name="numeroModal"> 000</p>
                                            <p>.</p>
                                    </label>

                                    <a href="#" class="btn btn-light corBotao mt-auto ptr">Participar</a>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- (FIM) MODAL VER DETALHES DA AÇÃO -->

        <!--######################################################################################################################-->


        <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>

        <script>
            
            $(document).ready(function() {
                $('.editBtn').on('click', function() {
                    $('#modalEdit').modal('show');
                })

                $('.btnFiltro').on('click', function(){
                    console.log('Teste');

                })
            })
        
        </script>

        <script type="text/javascript">
            /**function filtraAcao(){
                $.ajax ({
                    url: "php/carregaAcoes.php",
                    success: function(resultado){
                        $(".acoes").html(resultado);

                    },
                    error: function(){
                        $(".acoes").html("Não existe nenhuma ação");
                    }
                });

            }**/                  
            function atualizarAcao(){
                $.ajax ({
                    url: "php/carregaAcoes.php",
                    success: function(resultado){
                        $(".acoes").html(resultado);

                    },
                    error: function(){
                        $(".acoes").html("Não existe nenhuma ação");
                    }
                });
            }
            
            setInterval("atualizarAcao()", 1000);

            $(function(){
                atualizarAcao();
            });


        </script>
        

    </body>

    </html>