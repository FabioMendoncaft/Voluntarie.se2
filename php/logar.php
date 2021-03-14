<?php

session_start();

require 'conexao.php';
require 'usuario.php';

    $acao = $_GET['acao'];

    if($acao == 'cadastrar') {
        
        $conexao = new Conexao();

        $usuario = new Usuario($conexao);
        //remoção da barra e manipulando para o formato yyyy mm dd
        $data = explode('/', $_POST['data']);
        $dia = $data[0];
        $mes =$data[1];
        $ano =$data[2];
        $data_real = $ano . $mes . $dia;

        $usuario->setNome($_POST['nome']);
        $usuario->setEmail($_POST['email']);
        $usuario->setTelefone($_POST['telefone']);
        $usuario->setSenha($_POST['senha']);
        $usuario->setData($data_real);
        $usuario->setSexo($_POST['sexo']);

        $resultado = $usuario->cadastrar();

        if ($resultado == 'existe') {
            header('location: ../index.php?acao=existe');
        } else if ($resultado == 'nao existe'){
            header('location: ../index.php?acao=nexiste');
        }

    } else if ($acao == 'logar') {

        $conexao = new Conexao();

        $usuario = new Usuario($conexao);
        $usuario->setEmail($_POST['email']);
        $usuario->setSenha($_POST['senha']);
        
        $resultado = $usuario->logar();

        if($resultado == 'ok') {
            $_SESSION['autenticado'] = 'SIM';
            header('location: ../feed.php');
        } else if ($resultado == 'email ou senha invalidos') {
            $_SESSION['autenticado'] = 'NÃO';
            header('location: ../index.php?logar=nao');
        }
    }

?>