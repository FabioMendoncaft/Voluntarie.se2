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
        
        $this->setRoutes($routes);

    }

}

?>