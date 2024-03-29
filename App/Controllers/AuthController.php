<?php 

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class AuthController extends Action {

    public function autenticar(){

        $usuario = Container::getModel('Usuario');
        $usuario->__set('email',$_POST['email']);
        $usuario->__set('senha', /* base64_encode(*/$_POST['senha']/*)*/);
        $usuario->autenticar();

        if(!empty($usuario->__get('id')) && !empty($usuario->__get('nome')) ) {
            
            session_start();
            $_SESSION['id'] = $usuario->__get('id');
            $_SESSION['nome'] = $usuario->__get('nome');
            $_SESSION['email'] = $usuario->__get('email');

            header('Location: /feed'); 

        }else {
            
            $email = $usuario->getUsuarioPorEmail();

            if($email[0]['email'] == '' || $email[0]['email'] == null){
                header('Location: /?login=emailInvalido');
            }else{
                header('Location: /?login=erroSenha');
            }
            
        }
    }

    public function sair(){
        
        session_start();
        session_destroy();
        header('Location: /');
    }
}
?>