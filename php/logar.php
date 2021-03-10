<?php

require 'conexao.php';
require 'usuario.php';

    $acao = $_GET['acao'];

    if($acao == 'cadastrar') {
        
        $conexao = new Conexao();

        $usuario = new Usuario($conexao);

        $usuario->setNome($_POST['nome']);
        $usuario->setEmail($_POST['email']);
        $usuario->setTelefone($_POST['telefone']);
        $usuario->setSenha($_POST['senha']);
        $usuario->setData(str_replace('/', '', $_POST['data']));
        $usuario->setSexo($_POST['sexo']);
    

        $resultado = $usuario->cadastrar();

        if($resultado == 'possui cadastro') {
            header('Location: ../#bgCadastro?acao=ja');
        }

    } else if ($acao == 'logar') {

        $conexao = new Conexao();

        $usuario = new Usuario($conexao);
        $usuario->setEmail($_POST['email']);
        $usuario->setSenha($_POST['senha']);
        
        $resultado = $usuario->logar();

        if($resultado == 'ok') {
            header('location: ../feed.html');
        }


    
    }

?>