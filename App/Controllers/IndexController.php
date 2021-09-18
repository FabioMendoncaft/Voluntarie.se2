<?php 

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\OAuth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\POP3;
use PHPMailer\PHPMailer\SMTP;


class indexController extends Action {

    public function index(){

        $this->view->retorno_Cadastro = '';
        $this->view->login = isset($_GET['login']) ? $_GET['login'] : '';
        $this->render('index' ,'layout_index');
    }

    public function cadastrar() {

        $usuario = Container::getModel('Usuario');
        $usuario->__set('nome',$_POST['nome']);
        $usuario->__set('email',$_POST['email']);
        $usuario->__set('telefone',$_POST['telefone']);
        $usuario->__set('senha',base64_encode($_POST['senha']));
        $usuario->__set('data',$_POST['data']);
        $usuario->__set('sexo',$_POST['sexo']);

        if (count($usuario->getUsuarioPorEmail()) == 0) {
            
            $usuario->cadastrar();
            $this->view->retorno_Cadastro = 'cadastro_sucesso';
            $this->render('index', 'layout_index');

        } else {

            $this->view->retorno_Cadastro = 'ja_existe';
            $this->render('index', 'layout_index');
        }
    }

    public function recuperarSenha() {

        $usuario = Container::getModel('Usuario');
        $usuario->__set('email',$_POST['email']);

        $usuario->recuperarSenha();

        if(!empty($usuario->__get('id')) && !empty($usuario->__get('email')) ) {
        

            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->SMTPDebug =  false;
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'trabalhos.si07@gmail.com';
                $mail->Password   = 'Asenha123@';
                $mail->SMTPSecure = 'TLS';
                $mail->Port       = 587;
                //Recipients
                $mail->setFrom('trabalhos.si07@gmail.com', 'VoluntarieSe'); //email que envia
                $mail->addAddress($usuario->__get('email'), $usuario->__get('nome'));  //Destino
                //Content
                $mail->isHTML(true);                                  
                $mail->Subject = 'Email de recuperação de senha'; //assunto
                $mail->Body    = 'Olá, aqui está a sua senha: ' . $usuario->__get('senha') ; //corpo do email em HTML
                $mail->AltBody = 'Esse aqui nao é html'; //corpo do email normal

                $mail->SMTPOptions = array(
                    'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                    )
                    );

                $mail->send();
                
            } catch (Exception $e) {
                echo "O email não pode ser enviado";
            }
            $this->view->login = '';
            $this->view->retorno_Cadastro = 'email_enviado';
            $this->render('index', 'layout_index');
        }else {
            echo 'email nao existe';
        }

    }

}








?>