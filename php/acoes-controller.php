<?php 
session_start();
require 'conexao.php';
require 'acoes.php';


print_r($_POST);


if(isset($_GET['acao']) && $_GET['acao'] == 'criar'){

    $conexao = new Conexao();

    $acao = new Acoes($conexao);

    print_r($_SESSION);
     $acao->setId_usuario($_SESSION['id_usuario']);
    $acao->setTitulo($_POST['titulo']);
    $acao->setDescricao($_POST['descricao']);
    $acao->setLogradouro($_POST['logradouro']);
    $acao->SetCidade($_POST['cidade']);
    $acao->setBairro($_POST['bairro']);
    $acao->setUf($_POST['uf']);
    $acao->setComplemento($_POST['complemento']);
    $acao->setData($_POST['data']);
    $acao->setCategoria($_POST['categoria']);
    $acao->setImagem($_POST['imagem']);



    $acao->criarAcao();

}




?>