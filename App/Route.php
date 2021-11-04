<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

    protected function initRoutes(){

        $routes['home'] = array(
            'route' => '/',
            'controller' => 'indexController',
            'action' => 'index'
        );

        $routes['cadastrar'] = array(
            'route' => '/cadastrar',
            'controller' => 'indexController',
            'action' => 'cadastrar'
        );

        $routes['autenticar'] = array(
            'route' => '/autenticar',
            'controller' => 'AuthController',
            'action' => 'autenticar'
        );

        $routes['feed'] = array(
            'route' => '/feed',
            'controller' => 'AppController',
            'action' => 'feed'
        );

        $routes['sair'] = array(
            'route' => '/sair',
            'controller' => 'AuthController',
            'action' => 'sair'
        );

        $routes['recuperar'] = array(
            'route' => '/recuperar',
            'controller' => 'indexController',
            'action' => 'recuperarSenha'
        );

        $routes['criar_acao'] = array(
            'route' => '/criar_acao',
            'controller' => 'AppController',
            'action' => 'criarAcao'
        );

        $routes['incluir_acao'] = array(
            'route' => '/incluir_acao',
            'controller' => 'AppController',
            'action' => 'incluirAcao'
        );

        $routes['meu_perfil'] = array(
            'route' => '/meu_perfil',
            'controller' => 'AppController',
            'action' => 'meuPerfil'
        );
        
        $routes['remover_acao'] = array(
            'route' => '/remover_acao',
            'controller' => 'AppController',
            'action' => 'removerAcao'
        );

        $routes['alterar_senha'] = array(
            'route' => '/alterar_senha',
            'controller' => 'AppController',
            'action' => 'alterarSenha'
        );
        
        $routes['alt_senha'] = array(
            'route' => '/alt_senha',
            'controller' => 'AppController',
            'action' => 'altSenha'
        );

        $routes['action'] = array(
            'route' => '/action',
            'controller' => 'AppController',
            'action' => 'action'
        );
       
        $routes['filter'] = array(
            'route' => '/filter',
            'controller' => 'AppController',
            'action' => 'filter'
        );

        $routes['editar_acao'] = array(
            'route' => '/editar_acao',
            'controller' => 'AppController',
            'action' => 'editarAcao'
        );

        $routes['editar_user'] = array(
            'route' => '/editar_user',
            'controller' => 'IndexController',
            'action' => 'editarUser'
        );

        $routes['perfilSecundario'] = array(
            'route' => '/perfilSecundario',
            'controller' => 'AppController',
            'action' => 'perfilSecundario'
        );
		
		$routes['pesquisar_usuario'] = array(
            'route' => '/pesquisar_usuario',
            'controller' => 'AppController',
            'action' => 'pesquisarUsuario'
        );  

        $routes['dx_seguir_perfil'] = array(
            'route' => '/dx_seguir_perfil',
            'controller' => 'AppController',
            'action' => 'dxSeguirPerfil'
        );

        $routes['segDxseg_perfil'] = array(
            'route' => '/segDxseg_perfil',
            'controller' => 'AppController',
            'action' => 'segDxsegPerfil'
        );

        $routes['segDxseg_perfil2'] = array(
            'route' => '/segDxseg_perfil2',
            'controller' => 'AppController',
            'action' => 'segDxsegPerfil2'
        );

		$routes['comentarios'] = array(
            'route' => '/comentarios',
            'controller' => 'AppController',
            'action' => 'mostrarComentarios'
        );

        $routes['deletar_comentario'] = array(
            'route' => '/deletar_comentario',
            'controller' => 'AppController',
            'action' => 'deletarComentario'
        );

        $routes['enviar_comentario'] = array(
            'route' => '/enviar_comentario',
            'controller' => 'AppController',
            'action' => 'enviarComentario'
        );

        $routes['get_coment_by_id'] = array(
            'route' => '/get_coment_by_id',
            'controller' => 'AppController',
            'action' => 'getComentarioPorId'
        );

        $routes['editando_comentario'] = array(
            'route' => '/editando_comentario',
            'controller' => 'AppController',
            'action' => 'updateComentario'
        );

        $routes['comboxSelect'] = array(
            'route' => '/comboxSelect',
            'controller' => 'AppController',
            'action' => 'comboxSelect'
        );

        $routes['suporte'] = array(
            'route' => '/mensagem_enviada',
            'controller' => 'IndexController',
            'action' => 'mensagemSuporte'
        );

        $this->setRoutes($routes);

    }

}

?>