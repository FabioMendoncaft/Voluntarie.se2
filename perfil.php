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
                    telefone: {
                        required: true,
                        minlength: 9
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
        <!-- (FIM)NavBar Topo(PC) -->

        <!--####################################################################################################################-->

        <!-- NavBar MOBILE -->
        <!-- Navbar para Mobile(Barra Superior) -->
        <nav class="fixed-top navbar navbar-expand-lg navbar-light bg-light" id="navTopMobile">
            <div class="container-fluid">
                <a href="#"><img src="img/logo.png" alt="logo" id="imagem"></a>
            </div>
        </nav>
        <!-- (FIM)Navbar para Mobile(Barra Superior) -->

        <!-- Navbar para Mobile(Barra inferior) -->
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
        <!-- (FIM)Navbar para Mobile(Barra inferior) -->

        <!--####################################################################################################################-->

        <!-- Dados do perfil -->
        <div class="blocoPerfil">
            <div id="topPerfil"></div>

            <div id="blocoFotoPerfil">
                <img src="img/íconePerfil.jpg" alt="" id="imagemPerfil">
                <button id="editarImagem" class="ativarModall"><span class="material-icons">camera_alt</span></button>
            </div>

            <h1 id="nome">John Galt</h1>
            <hr>
            <strong><label>Sobre Você</label></strong>

            <div id="blocoDados">
                <span class="material-icons">mail_outline</span>
                <p class="dados">E-mail:
                    <p id="email">fabio.mendonca.f@gmail.com</p>
                </p>

                <span class="material-icons"> phone</span>
                <p class="dados">Telefone:
                    <p id="telefone">(00)00000-0000</p>
                </p>

                <span class="material-icons"> calendar_today</span>
                <p class="dados">Data de nascimento:
                    <p id="dNascimento">00/00/0000</p>
                </p>

                <span class="material-icons"> transgender</span>
                <p class="dados">Sexo:
                    <p id="sexo">Masculino</p>
                </p>
            </div>

            <button type="submit" class="btn btn-light corBotao ativarModal" id="editarDados">Editar dados</button>

        </div>
        <!-- (FIM)Dados do perfil -->

        <!--####################################################################################################################-->

        <!-- MODAL - Tela de editar dados -->
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
                            <select aria-label="Dia" name="data" id="Dia" title="Dia" class="dia">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select><select aria-label="Mês" name="data" id="month" title="Mês" class="mes">
                                <option value="1">Jan</option>
                                <option value="2">Fev</option>
                                <option value="3">Mar</option>
                                <option value="4">Abr</option>
                                <option value="5">Mai</option>
                                <option value="6">Jun</option>
                                <option value="7">Jul</option>
                                <option value="8">Ago</option>
                                <option value="9">Set</option>
                                <option value="10">Out</option>
                                <option value="11">Nov</option>
                                <option value="12">Dez</option>
                            </select><select aria-label="Ano" name="data" id="year" title="Ano" class="ano">
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                                <option value="1999">1999</option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                                <option value="1989">1989</option>
                                <option value="1988">1988</option>
                                <option value="1987">1987</option>
                                <option value="1986">1986</option>
                                <option value="1985">1985</option>
                                <option value="1984">1984</option>
                                <option value="1983">1983</option>
                                <option value="1982">1982</option>
                                <option value="1981">1981</option>
                                <option value="1980">1980</option>
                                <option value="1979">1979</option>
                                <option value="1978">1978</option>
                                <option value="1977">1977</option>
                                <option value="1976">1976</option>
                                <option value="1975">1975</option>
                                <option value="1974">1974</option>
                                <option value="1973">1973</option>
                                <option value="1972">1972</option>
                                <option value="1971">1971</option>
                                <option value="1970">1970</option>
                                <option value="1969">1969</option>
                                <option value="1968">1968</option>
                                <option value="1967">1967</option>
                                <option value="1966">1966</option>
                                <option value="1965">1965</option>
                                <option value="1964">1964</option>
                                <option value="1963">1963</option>
                                <option value="1962">1962</option>
                                <option value="1961">1961</option>
                                <option value="1960">1960</option>
                                <option value="1959">1959</option>
                                <option value="1958">1958</option>
                                <option value="1957">1957</option>
                                <option value="1956">1956</option>
                                <option value="1955">1955</option>
                                <option value="1954">1954</option>
                                <option value="1953">1953</option>
                                <option value="1952">1952</option>
                                <option value="1951">1951</option>
                                <option value="1950">1950</option>
                                <option value="1949">1949</option>
                                <option value="1948">1948</option>
                                <option value="1947">1947</option>
                                <option value="1946">1946</option>
                                <option value="1945">1945</option>
                                <option value="1944">1944</option>
                                <option value="1943">1943</option>
                                <option value="1942">1942</option>
                                <option value="1941">1941</option>
                                <option value="1940">1940</option>
                                <option value="1939">1939</option>
                                <option value="1938">1938</option>
                                <option value="1937">1937</option>
                                <option value="1936">1936</option>
                                <option value="1935">1935</option>
                                <option value="1934">1934</option>
                                <option value="1933">1933</option>
                                <option value="1932">1932</option>
                                <option value="1931">1931</option>
                                <option value="1930">1930</option>
                                <option value="1929">1929</option>
                                <option value="1928">1928</option>
                                <option value="1927">1927</option>
                                <option value="1926">1926</option>
                                <option value="1925">1925</option>
                                <option value="1924">1924</option>
                                <option value="1923">1923</option>
                                <option value="1922">1922</option>
                                <option value="1921">1921</option>
                                <option value="1920">1920</option>
                            </select>
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
        <!-- (FIM)MODAL - Tela de editar dados -->

        <!--####################################################################################################################-->

        <!-- MODAL - Tela de editar foto -->
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
        <!-- (FIM)MODAL - Tela de editar foto -->

        <script src="JavaScript/perfil.js"></script>



    </body>

    </html>