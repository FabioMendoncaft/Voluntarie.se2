<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Voluntarie.se | Bem-vindo ao Voluntarie</title>
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="img/site.webmanifest">
    <link href="bootstrap-5.0.0-beta2-dist/bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"> </script>
    <script type="text/javascript" src="js/bootstrap.min.js"> </script>
    <script type="text/javascript" src="js/jquery.validate.min.js"> </script>
    <script type="text/javascript" src="js/additional-methods.min.js"> </script>
    <script type="text/javascript" src="js/localization/messages_pt_BR.js"></script>
    <script type="text/javascript" src="js/jquery.mask.min.js"></script>


    <script type="text/javascript">

        $(document).ready(function () {
            $("#telefone").mask("(00)00000-0000")
        })
        $(document).ready(function () {
            $("#data").mask("00/00/0000")
        })

        $(document).ready(function () {
            $("#esqueciSenhaa").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    }
                }
            })
        })

        $(document).ready(function () {
            $("#cadastro").validate({
                rules: {
                    nome: {
                        required: true,
                        maxlength: 100,
                        minlength: 10,
                        minWords: 2
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    senha: {
                        required: true,
                        rangelength: [6, 10]
                    },
                    confirmar: {
                        required: true,
                        equalTo: "#senha"
                    },
                    telefone: {
                        required: true,
                        minlength: 9,
                    },
                    sexo: {
                        required: true,
                    }
                },
            })
        })

    </script>
</head>

<body>
    <div class="containe">
    
            <?php if( isset($_GET['acao']) && $_GET['acao'] == 'existe' ) { ?>
                <div class="feedback" style="background: red; height: 50px; color: white; text-align: center; font-size: 20px;");>
                   <label style="margin-top: 8px">Usuário já cadastrado!</label>
                </div>
            <?php } ?>

            <?php if( isset($_GET['acao']) && $_GET['acao'] == 'nexiste' ) { ?>
                <div class="feedback" style="background: #4ee44e; height: 50px; color: white; text-align: center; font-size: 20px;");>
                   <label style="margin-top: 8px">Cadastro realizado com sucesso!</label>
                </div>
            <?php } ?>

            <?php if( isset($_GET['logar']) && $_GET['logar'] == 'nao' ) { ?>
                <div class="feedback" style="background: red; height: 50px; color: white; text-align: center; font-size: 20px;");>
                   <label style="margin-top: 8px">E-mail ou senha inválido!</label>
                </div>
            <?php } ?>

        <header>
            <!--Tela inicial(login)-->
            <div class="img-wrapper">
                <img src="img/bg.jpg" alt="">
            </div>

            <div class="banne">
                <h1>Voluntarie<strong style="color:#f83600;">.</strong>se</h1>
                <form method="post" class="form" action="php/logar.php?acao=logar">
                    <input type="email" name="email" id="emailTeste" placeholder="Digite seu e-mail" required>
                    <br>
                    <input type="password" name="senha" id="senhaTeste" class="password" placeholder="Digite sua senha"
                        required>
                    <br>
                    <button style="float: left;" id="botaoEntrar">Entrar</button>
                </form>
                <a href="#bgCadastro"><button id="botaoCadastro" class="ativarModal">Criar conta</button></a>
                <br>
                <a href="#bgSenha" class="esqueciSenha ativarModall">Esqueci minha senha</a>
            </div>

            
            
            
            
            <!--Tela de cadastro-->
            <div id="modall-cadastro" class="modall-cadastro">
                <div class="modall">
                    <button class="close">X</button>
                    <form class="form" method="post" action="php/logar.php?acao=cadastrar" id="cadastro">
                        <div class="card1">
                            <div class="card1-top">
                                <img class="logoCadastro" src="img/logo.png" alt="login">
                            </div>
    
                            <div class="card1-group">
                                <label>Nome</label>
                                <input type="text" name="nome" id="nome" placeholder="Digite seu nome" required>
                            </div>
    
                            <div class="card1-group">
                                <label>E-mail</label>
                                <input type="email" name="email" id="email" placeholder="Digite seu e-mail" required>
                            </div>
    
                            <div class="card1-group">
                                <label>Telefone</label>
                                <input type="text" name="telefone" id="telefone" placeholder="Digite seu telefone">
                            </div>
    
                            <div class="card1-group">
                                <label>Senha</label>
                                <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
                            </div>
    
                            <div class="card1-group">
                                <label>Confirmar</label>
                                <input type="password" name="confirmar" id="confirmar" placeholder="Confirmar senha"
                                    required>
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
    
                            <div class="card1-group btn">
                                <button class="btn btn-danger" type="submit">Cadastrar</button>
                            </div>
                    
                        </div>
                    </form>    
                </div>
            </div>





            <!--Tela de esquici senha-->
            <div id="modall-esqueci" class="modall-esqueci">
                <div class="modall-esqSenha">
                    <button class="close">X</button>
                    <form class="form" action="#" id="esqueciSenhaa">
                        <div class="card1">
                            <div class="card1-top">
                                <img class="logoEsqueciSenha" src="img/logo.png" alt="login">
                            </div>
    
                            <div class="card1-group" id="insiriaSeuEmail">
                                <label>Insira seu e-mail para redefinir sua senha</label>
                                <input type="email" name="email" id="email" placeholder="E-mail">
                            </div>
    
                            <div class="card1-group btn">
                                <button type="submit">REDEFINIR</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </header>
    </div>

    <script src="JavaScript/index.js"></script>

</body>
</html>