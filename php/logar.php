<?php

require 'conexao.php';
require 'usuario.php';

echo 'Estamos aqui normal';

echo '<pre>';
print_r($_POST);
echo '</pre>';


    $acao = $_GET['acao'];

    if($acao == 'cadastrar') {
        
        $conexao = new Conexao();

        $usuario = new Usuario($conexao);

        $usuario->setNome($_POST['nome']);
        $usuario->setEmail($_POST['email']);
        $usuario->setTelefone($_POST['telefone']);
        $usuario->setSenha($_POST['senha']);
        $usuario->setData($_POST['data']);
        $usuario->setSexo($_POST['sexo']);
    

        $resultado = $usuario->cadastrar();

       echo 'resultadosss';
       echo  $resultado;

    } else if ($acao == 'logar') {

        $conexao = new Conexao();

        $usuario = new Usuario($conexao);
        $usuario->setEmail($_POST['email']);
        $usuario->setSenha($_POST['senha']);
        
        $resultado = $usuario->logar();

        foreach($resultado as $user) {
            
        }



    }

?>