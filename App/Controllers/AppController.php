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

        $imagem = Container::getModel('Imagem');
        $imagem->__set('id_usuario', $_SESSION['id'] ); 
        $imagem_perfil = $imagem->recuperarImagem();

      
        $this->view->minha_imagem = $imagem_perfil;
        

        //Informaçoes do filtro
        $filter = Container::getModel('Filter');
        $filtrar = '';
        if (!empty($_POST['estado'])) {
            $filter->__set('estado', $_POST['estado']);
            $filtrar = 'X';
        }
        
        if (!empty($_POST['cidade'])) {
            $filter->__set('cidade', $_POST['cidade']);
            $filtrar = 'X';
        }

        if (!empty($_POST['categoria'])) {
            $filter->__set('categoria', $_POST['categoria']);
            $filtrar = 'X';
        }

        //Busca apenas o filtrado
        if ($filtrar = 'X') {
            $acoesF = $filter->getaActionFilter();
            $this->view->all_acoes = $acoesF;
            $this->view->all_acoesF = $acoes;
        }else{
            $this->view->all_acoes = $acoes;
            $this->view->all_acoesF = $acoes;
        }

        $this->render('feed', 'layout_app');

    }
    public function filter() {
        
        $this->validaAutenticacao();

        $filter = Container::getModel('Filter');
        if (!empty($_POST['estado'])) {
            $filter->__set('estado', $_POST['estado']);
        }
        
        if (!empty($_POST['cidade'])) {
            $filter->__set('cidade', $_POST['cidade']);
        }

        if (!empty($_POST['categoria'])) {
            $filter->__set('categoria', $_POST['categoria']);
        }

        //Busca apenas o filtrado
        $acoes = $filter->getaActionFilter();
        $this->view->all_acoes = $acoes;

        //Busca todos os valores
        $acao = Container::getModel('Acao');
        $acoesF = $acao->getAll();
        $this->view->all_acoesF = $acoesF;

        //Imagem
        $imagem = Container::getModel('Imagem');
        $imagem->__set('id_usuario', $_SESSION['id'] ); 
        $imagem_perfil = $imagem->recuperarImagem();

      
        $this->view->minha_imagem = $imagem_perfil;

        $this->render('filter', 'layout_app');

    }
    // métodos utilizados na pagina de criar acao *****INICIO*****
    public function criarAcao() {
        
        $this->validaAutenticacao();

        $imagem = Container::getModel('Imagem');
        $imagem->__set('id_usuario', $_SESSION['id'] ); 
        $imagem_perfil = $imagem->recuperarImagem();

        $this->view->erro_extensao       = '0';
        $this->view->erro_tamanho        = '0';
        $this->view->minha_imagem = $imagem_perfil;
        $this->render('criarAcao', 'layout_app'); 

    }

    public function incluirAcao() {
       
        $this->validaAutenticacao();

        $imagem = Container::getModel('Imagem');
        $nome_imagem = $imagem->validaImagemAcao();

        $this->view->erro_extensao       = '0';
        $this->view->erro_tamanho        = '0';

        if ($nome_imagem == 'erro extensao'){

            $imagem = Container::getModel('Imagem');
            $imagem->__set('id_usuario', $_SESSION['id'] ); 
            $imagem_perfil = $imagem->recuperarImagem();
    
            $this->view->minha_imagem = $imagem_perfil;
            $this->view->erro_extensao = 'erro extensao';
            $this->render('criarAcao', 'layout_app'); 

        }else if ($nome_imagem == 'erro tamanho'){

            $imagem = Container::getModel('Imagem');
            $imagem->__set('id_usuario', $_SESSION['id'] ); 
            $imagem_perfil = $imagem->recuperarImagem();
    
            $this->view->minha_imagem = $imagem_perfil;
            $this->view->erro_tamanho  = 'erro tamanho';
            $this->render('criarAcao', 'layout_app'); 

        }else{
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
            $acao->__set('numero', $_POST['numero']);
            $acao->__set('latitude', $_POST['latitude']);
            $acao->__set('longitude', $_POST['longitude']);
            $acao->__set('imagem',  $nome_imagem); 
            $acao->addAcao();
            header('Location: /feed');
        }

    }

    // EDITAR DADOS DAS AÇÕES

    public function editarAcao() {
       
        $this->validaAutenticacao();

        $acao = Container::getModel('Acao'); 

        $acao->__set('id', $_GET['id_acao'] );
        $acao->__set('id_usuario',$_SESSION['id']);
        $acao->__set('titulo', $_POST['titulo'] );
        $acao->__set('descricao',  $_POST['descricao'] );
        $acao->__set('logradouro', $_POST['logradouro'] );
        $acao->__set('cidade', $_POST['cidade'] );
        $acao->__set('bairro', $_POST['bairro'] );
        $acao->__set('uf', $_POST['uf'] );
        $acao->__set('complemento', $_POST['complemento'] );  
        $acao->__set('data_evento', $_POST['data_evento'] );
        $acao->__set('categoria', $_POST['categoria'] );

        $acao->editarAcao(); 
        
        header('Location: /meu_perfil');

    }

    // (FIM) EDITAR DADOS DAS AÇÕES
    
    // métodos utilizados na pagina de criar acao *****FIM*****

     // Meu perfil *****INICIO*****
     public function meuPerfil(){

        $this->validaAutenticacao();
            
            $imagem = Container::getModel('Imagem');
            $imagem->__set('id_usuario', $_SESSION['id'] );
            $valida_imagem = $imagem->validaImagemPerfil();
            $imagem_perfil = $imagem->recuperarImagem();

            $acao = Container::getModel('Acao'); 
            $acao->__set('id_usuario', $_SESSION['id'] );
            $acoes = $acao->getAllMinhaAcao();

            $usuario = Container::getModel('Usuario');
            $usuario->__set('email', $_SESSION['email'] );
            $dados_usuario = $usuario->getDadosUsuario();

            $usuario->__set('id', $_SESSION['id'] );
            $acoes_participo = $usuario->acoesParticipo();


            $seguindo = Container::getModel('UsuarioSeguindo');
            $seguindo->__set('id_usuario_origem', $_SESSION['id']);
            $qun_seguindo = $seguindo->usuarioDestino();

            $seguidores = Container::getModel('UsuarioSeguindo');
            $seguidores->__set('id_usuario_destino', $_SESSION['id']);
            $qun_seguidores = $seguidores->usuarioOrigem();

            $this->view->seguidores          = $qun_seguidores;
            $this->view->seguindo            = $qun_seguindo;
            $this->view->minha_imagem        = $imagem_perfil;
            $this->view->acoes_que_participo = $acoes_participo;
            $this->view->info_usuario        = $dados_usuario;
            $this->view->minhas_acoes        = $acoes;
            $this->view->erro_extensao       = '0';
            $this->view->erro_tamanho        = '0';
            if ($valida_imagem == 'erro extensao'){
                $this->view->erro_extensao = 'erro extensao';
            }
            if ($valida_imagem == 'erro tamanho'){
                $this->view->erro_tamanho  = 'erro tamanho';
            }
            $this->render('perfil', 'layout_app');
    }


    // Perfil2
    public function perfilSecundario(){

        $this->validaAutenticacao();
        
        if ($_GET['id_usuario'] == $_SESSION['id']){
            
            $imagem = Container::getModel('Imagem');
            $imagem->__set('id_usuario', $_SESSION['id'] );
            $valida_imagem = $imagem->validaImagemPerfil();
            $imagem_perfil = $imagem->recuperarImagem();

            $acao = Container::getModel('Acao'); 
            $acao->__set('id_usuario', $_SESSION['id'] );
            $acoes = $acao->getAllMinhaAcao();

            $usuario = Container::getModel('Usuario');
            $usuario->__set('email', $_SESSION['email'] );
            $dados_usuario = $usuario->getDadosUsuario();

            $usuario->__set('id', $_SESSION['id'] );
            $acoes_participo = $usuario->acoesParticipo();


            $seguindo = Container::getModel('UsuarioSeguindo');
            $seguindo->__set('id_usuario_origem', $_SESSION['id']);
            $qun_seguindo = $seguindo->usuarioDestino();

            $seguidores = Container::getModel('UsuarioSeguindo');
            $seguidores->__set('id_usuario_destino', $_SESSION['id']);
            $qun_seguidores = $seguidores->usuarioOrigem();

            $this->view->seguidores          = $qun_seguidores;
            $this->view->seguindo            = $qun_seguindo;
            $this->view->minha_imagem        = $imagem_perfil;
            $this->view->acoes_que_participo = $acoes_participo;
            $this->view->info_usuario        = $dados_usuario;
            $this->view->minhas_acoes        = $acoes;
            $this->view->erro_extensao       = '0';
            $this->view->erro_tamanho        = '0';
            if ($valida_imagem == 'erro extensao'){
                $this->view->erro_extensao = 'erro extensao';
            }
            if ($valida_imagem == 'erro tamanho'){
                $this->view->erro_tamanho  = 'erro tamanho';
            }
            $this->render('perfil', 'layout_app'); 

        }else{
            $imagem = Container::getModel('Imagem');
            $imagem->__set('id_usuario', $_GET['id_usuario'] );
            $imagem->validaImagemPerfil(); 
            $imagem_perfil = $imagem->recuperarImagem();

            $acao = Container::getModel('Acao'); 
            $acao->__set('id_usuario', $_GET['id_usuario'] );
            $acoes = $acao->acoesPerfil2($_SESSION['id']);
    
            $usuario = Container::getModel('Usuario');
            $usuario->__set('id', $_GET['id_usuario'] );
            $usuario->__set('id_logado', $_SESSION['id']);
            $dados_usuario = $usuario->usuarioPerfil2();

            $this->view->minha_imagem = $imagem_perfil;
            $this->view->perfil2_user = $dados_usuario;
            $this->view->perfil2_acoes= $acoes;
            
            $this->render('perfil2', 'layout_app');

        }

    }
    // FIM - Perfil2

    public function removerAcao(){

        $this->validaAutenticacao();

        $acao = Container::getModel('Acao'); 
        $acao->__set('id', $_POST['id']);
        $acao->__set('id_usuario', $_SESSION['id'] );

        $acao->delAcao();

        header('Location: /meu_perfil');
    }

    // Meu perfil *****FIM*****

    public function alterarSenha() {

        $this->validaAutenticacao();

        $usuario = Container::getModel('Usuario');

        $this->render('alterarSenha', 'layout_app');

    }

    public function altSenha() {

           $this->validaAutenticacao();
           $usuario = Container::getModel('Usuario');

           $usuario->__set('id' , $_SESSION['id']);
           $usuario->__set('senha' , $_POST['novaSenha']);
       
           $usuario->mudarSenha();

    }

    public function action() {

        $this->validaAutenticacao();

       $action = isset($_POST['action']) ? $_POST['action'] : '';
       $id_acao = isset($_POST['id_acao']) ? $_POST['id_acao'] : '';

 
       $action_participante = Container::getModel('AcaoParticipante');
       $action_participante->__set('id_usuario', $_SESSION['id']);
       $action_participante->__set('id_acao', $id_acao);
        if($action == 'participar') {
            $action_participante->participarAcao();
            //$url = str_replace('http://localhost:8080' , '' , $_SERVER['HTTP_REFERER']);

            //header('Location:'. $url );

        } else if($action == 'deixar_de_participar' ) {
            $action_participante->deixarParticiparAcao();
            
            //$url = str_replace('http://localhost:8080' , '' , $_SERVER['HTTP_REFERER']);

            //header('Location:'. $url );

        }

        $action_participante->__set('id_acao', $id_acao);

    }
	
	public function pesquisarUsuario() {
        
        $this->validaAutenticacao();

        if (!empty($_POST)) {
            $usuario = Container::getModel('Usuario');
            $usuario->__set('nome', $_POST['nome_usuario']);
            $usuario->__set('id', $_SESSION['id'] ); 

            $usuarios = $usuario->pesquisarUsuario();

        } else {
            $usuarios = array();
        }

        $imagem = Container::getModel('Imagem');
        $imagem->__set('id_usuario', $_SESSION['id'] ); 
        $imagem_perfil = $imagem->recuperarImagem();

        $this->view->users = $usuarios;
        $this->view->minha_imagem = $imagem_perfil;

        $this->render('pesquisarUsuario', 'layout_app');

        $this->seguir();

    }


    public function seguir(){

        $seguir = isset($_GET['seguir']) ? $_GET['seguir'] : '';
        $id_usuario_destino = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : '';

        $usuario_seguindo = Container::getModel('UsuarioSeguindo');
        $usuario_seguindo->__set('id_usuario_origem', $_SESSION['id']);
        $usuario_seguindo->__set('id_usuario_destino', $id_usuario_destino);

        if($seguir == 'seguir') {
            $usuario_seguindo->seguirUsuario();
            $this->render('pesquisarUsuario', 'layout_app');

            return true;

        } else if($seguir == 'deixar_de_seguir' ) {

            $usuario_seguindo->deixarDeSeguirUsuario();
            $this->render('pesquisarUsuario', 'layout_app');

            return true;
        }
    }

    public function dxSeguirPerfil(){

        $this->validaAutenticacao();
        
        $usuario_seguindo = Container::getModel('UsuarioSeguindo');
        $usuario_seguindo->__set('id_usuario_origem', $_SESSION['id']);
        $usuario_seguindo->__set('id_usuario_destino', $_GET['id_destino']);
        $usuario_seguindo->deixarDeSeguirUsuario();
        
        header('Location: /meu_perfil');
    }

    public function segDxsegPerfil(){

        $this->validaAutenticacao();

        $seguir = isset($_GET['seguir']) ? $_GET['seguir'] : '';
        $id_usuario_destino = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : '';

        $usuario_seguindo = Container::getModel('UsuarioSeguindo');
        $usuario_seguindo->__set('id_usuario_origem', $_SESSION['id']);
        $usuario_seguindo->__set('id_usuario_destino', $id_usuario_destino);

        if($seguir == 'seguir') {
            $usuario_seguindo->seguirUsuario();
            header('Location: /meu_perfil');

            return true;

        } else if($seguir == 'deixar_de_seguir' ) {

            $usuario_seguindo->deixarDeSeguirUsuario();
            header('Location: /meu_perfil');

            return true;
        }
    }

    public function segDxsegPerfil2(){

        $this->validaAutenticacao();

        $seguir = isset($_GET['seguir']) ? $_GET['seguir'] : '';
        $id_usuario_destino = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : '';

        $usuario_seguindo = Container::getModel('UsuarioSeguindo');
        $usuario_seguindo->__set('id_usuario_origem', $_SESSION['id']);
        $usuario_seguindo->__set('id_usuario_destino', $id_usuario_destino);

        if($seguir == 'seguir') {
            $usuario_seguindo->seguirUsuario();
            
            header('Location: /perfilSecundario?id_usuario='. $id_usuario_destino);

            return true;

        } else if($seguir == 'deixar_de_seguir' ) {

            $usuario_seguindo->deixarDeSeguirUsuario();

            header('Location: /perfilSecundario?id_usuario='. $id_usuario_destino);

            return true;
        }
    }    


	public function mostrarComentarios() {

            $comentario = Container::getModel('Comentario');
            $comentario->__set('id_acao', $_POST['acao']);
            $comentarios = $comentario->recuperarComentarios();

            echo json_encode($comentarios);

        }

        public function deletarComentario(){

            $comentario = Container::getModel('Comentario');
            $comentario->__set('id', $_POST['id']);
            $comentario->excluirComentario();

        }

        public function enviarComentario(){

            $this->validaAutenticacao();

            $comentario = Container::getModel('Comentario');
            $comentario->__set('id_acao', $_POST['acao']);
            $comentario->__set('comentario', $_POST['comentario']);
            $comentario->__set('id_usuario', $_SESSION['id']);

            $comentario->inserirComentario();

        }

        public function getComentarioPorId(){

            $comentario = Container::getModel('Comentario');
            $comentario->__set('id', $_POST['id']);

            $comentario_caixa = $comentario->recuperarComentarioPorId();

            echo json_encode($comentario_caixa);

        }

        public function updateComentario(){

            $comentario = Container::getModel('Comentario');
            $comentario->__set('id', $_POST['id']);
            $comentario->__set('comentario', $_POST['comentario']);
            
            $comentario->atualizaComentario();

        }

        public function comboxSelect(){

            $combox = Container::getModel('Filter');
            $combox->__set('estado', $_POST['estado']);
            $comboxValue = $combox->readSelect();
            echo json_encode($comboxValue);

        }   
        
        public function participantesAcoes(){

            $this->validaAutenticacao();
            
            $participante_acoes = Container::getModel('AcaoParticipante');
            $participante_acoes->__set('id_acao', $_GET['id_acao']);
            $participantes =  $participante_acoes->participantesAcoes();

            $imagem = Container::getModel('Imagem');
            $imagem->__set('id_usuario', $_SESSION['id'] ); 
            $imagem_perfil = $imagem->recuperarImagem();

            $this->view->participantes = $participantes;
            $this->view->minha_imagem = $imagem_perfil;
    
            $this->render('participantesAcoes', 'layout_app');

        }
		
		 public function allAcoes(){

           $acao = Container::getModel('Acao');
           $acoes = $acao->allAcoesFeed();

           echo json_encode($acoes);
        }
}    

?>