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
                    data: {

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
                <div class="feedback" id="cadastrado");>
                   <label class="top">Usuário já cadastrado!</label>
                </div>
            <?php } ?>

            <?php if( isset($_GET['acao']) && $_GET['acao'] == 'nexiste' ) { ?>
                <div class="feedback" id="sucesso");>
                   <label class="top">Cadastro realizado com sucesso!</label>
                </div>
            <?php } ?>

            <?php if( isset($_GET['logar']) && $_GET['logar'] == 'nao' ) { ?>
                <div class="feedback" id="invalido");>
                   <label class="top">E-mail ou senha inválido!</label>
                </div>
            <?php } ?>

        <header>
            <!--Tela inicial(login)-->
            <div class="img-wrapper">
                <img src="img/bg.jpg" alt="">
            </div>

            <div class="banne">
                <h1>Voluntarie<strong id="ponto">.</strong>se</h1>
                <form method="post" class="form" action="php/logar.php?acao=logar">
                    <input type="email" name="email" id="emailTeste" placeholder="Digite seu e-mail" required>
                    <br>
                    <input type="password" name="senha" id="senhaTeste" class="password" placeholder="Digite sua senha"
                        required>
                    <br>
                    <button id="botaoEntrar">Entrar</button>
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
                                <input type="text" name="data" id="data" placeholder="Data de nascimento" required>
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