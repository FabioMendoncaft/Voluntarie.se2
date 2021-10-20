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

        $this->setRoutes($routes);

    }

}

?>