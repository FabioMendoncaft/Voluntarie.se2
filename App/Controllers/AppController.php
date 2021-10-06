<?php 

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;


class AppController extends Action {

    public function validaAutenticacao(){
        //Funcao criada para evitar repetição de código, para validar sessão basta chamá-la
        session_start();

        if(!isset($_SESSION['id']) || $_SESSION['id'] == '' ||  !isset($_SESSION['nome']) || $_SESSION['nome'] == '') { 
            header('Location: /feed');
        }

    }

    public function feed() {
        
        $this->validaAutenticacao();

        $acao = Container::getModel('Acao');
        $acoes = $acao->getAll();
        
        $this->view->all_acoes = $acoes;
        $this->render('feed', 'layout_app');

    }

    // métodos utilizados na pagina de criar acao *****INICIO*****
    public function criarAcao() {
        
        $this->validaAutenticacao();
        $this->render('criarAcao', 'layout_app'); 

    }

    public function incluirAcao() {
       
        $this->validaAutenticacao();

        $arquivo = $_FILES['imagem'];
        $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        $arquivo_nome = md5(uniqid($arquivo['name'])).".".$extensao;

        $acao = Container::getModel('Acao');   

        $acao->__set('id_usuario', $_SESSION['id'] );
        $acao->__set('titulo', $_POST['titulo'] );
        $acao->__set('descricao',  $_POST['descricao'] );
        $acao->__set('logradouro', $_POST['logradouro'] );
        $acao->__set('cidade', $_POST['cidade'] );
        $acao->__set('bairro', $_POST['bairro'] );
        $acao->__set('uf', $_POST['uf'] );
        $acao->__set('complemento', $_POST['complemento'] );  
        $acao->__set('data_evento', $_POST['data_evento'] );
        $acao->__set('categoria', $_POST['categoria'] );
        $acao->__set('imagem',  $arquivo_nome  /*'imagem']['tmp_name']  $_POST['imagem'] */ ); 

        header('Location: /feed');
    
        $acao->addAcao(); 

    }

    // métodos utilizados na pagina de criar acao *****FIM*****

     // Meu perfil *****INICIO*****
    public function meuPerfil(){

        $this->validaAutenticacao();

            $acao = Container::getModel('Acao'); 
            $acao->__set('id_usuario', $_SESSION['id'] );
            $acoes = $acao->getAllMinhaAcao();

            $usuario = Container::getModel('Usuario');
            $usuario->__set('email', $_SESSION['email'] );

            $dados_usuario = $usuario->getUsuarioPorEmail();

            $this->view->info_usuario = $dados_usuario;
            $this->view->minhas_acoes = $acoes;
            $this->render('perfil', 'layout_app');

    }

    public function removerAcao(){

        $this->validaAutenticacao();

        $acao = Container::getModel('Acao'); 
        $acao->__set('id', $_POST['id']);
        $acao->__set('id_usuario', $_SESSION['id'] );

        $acao->delAcao();

        header('Location: /meu_perfil');
    }

    // Meu perfil *****FIM*****

}    

?>