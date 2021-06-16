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

    header('location: ../feed.php');

} else if (isset($_GET['acao']) && $_GET['acao'] == 'remover'){

    echo 'cheguei aqui';

    $conexao = new Conexao();
    $acao = new Acoes($conexao);
    $acao->setId($_GET['id']);
    $acao->excluirAcao();

    header('location: minhas-acoes.php');
    
} else if (isset($_GET['acao']) && $_GET['acao'] == 'alterar') {

    $conexao = new Conexao();
    $acao = new Acoes($conexao);

    $acao->setId($_GET['id']);
    $acao->setTitulo($_POST['titulo']);
    $acao->setDescricao($_POST['descricao']);
    $acao->setLogradouro($_POST['logradouro']);
    $acao->SetCidade($_POST['cidade']);
    $acao->setBairro($_POST['bairro']);
    $acao->setUf($_POST['uf']);
    $acao->setComplemento($_POST['complemento']);
    $acao->setCategoria($_POST['categoria']);
        $data = explode('/', $_POST['data']);
            $dia = $data[0];
            $mes =$data[1];
            $ano =$data[2];
            $data_real = $ano . $mes . $dia;
    $acao->setData($data_real);
    $acao->editarAcao();

    header('Location: ../minhas-acoes.php'); 
 
 } else if (isset($_GET['acao']) && $_GET['acao'] == 'participar'){
    
    $conexao = new Conexao();
    $acao = new Acoes($conexao);
    $acao->setId($_GET['id']);
    $acao->setQtdPart(1);
    $acao->ParticipaAcoes();
    header('Location: ../feed.php');
    
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

} 
?>