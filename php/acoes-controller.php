<?php 
session_start();
require 'conexao.php';
require 'acoes.php';


if(isset($_GET['acao']) && $_GET['acao'] == 'criar'){

    $conexao = new Conexao();

    $acao = new Acoes($conexao);

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

    header('location: feed.php');

} else if ($acao == 'recuperar') {
    
    $conexao = new Conexao();
    $acao = new Acoes($conexao);
    $acao->setId_usuario($_SESSION['id_usuario']);

    $minha_acao = $acao->listarMinhaAcao();

} else if ($acao == 'feed') {

    $conexao = new Conexao();
    $acao = new Acoes($conexao);
    $acao->setId_usuario($_SESSION['id_usuario']);

    $minha_acao = $acao->listaAcoes();

} else if (isset($_GET['acao']) && $_GET['acao'] == 'remover'){

    $conexao = new Conexao();
    $acao = new Acoes($conexao);
    $acao->setId($_GET['id']);
    $acao->excluirAcao();

    header('location: minhas-acoes.php');

}
?>