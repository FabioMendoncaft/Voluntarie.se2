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

    public function validaAutenticacao(){
        //Funcao criada para evitar repetição de código, para validar sessão basta chamá-la
        session_start();

        if(!isset($_SESSION['id']) || $_SESSION['id'] == '' ||  !isset($_SESSION['nome']) || $_SESSION['nome'] == '') { 
            header('Location: /feed');
        }

    }

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
        $usuario->__set('senha',/*base64_encode( */$_POST['senha']) /*)*/ ;
        $usuario->__set('data_nascimento', date('Y/m/d', strtotime($_POST['data'])));
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

        //Editar Usuário
        public function editarUser() {

            $this->validaAutenticacao();

           $usuario = Container::getModel('Usuario');
            $usuario->__set('id',$_SESSION['id']);
            $usuario->__set('nome',$_POST['nome']);
            $usuario->__set('telefone',$_POST['telefone']);
            $usuario->__set('data_nascimento', date('Y/m/d', strtotime($_POST['data'])));
            $usuario->__set('sexo',$_POST['sexo']);
    
            $usuario->editarUser();
            
            header('Location: /meu_perfil');
            
        }
        // FIM - Editar Usuário

        public function esqueciSenha() {

            $usuario = Container::getModel('Usuario');
            $usuario->__set('email', $_POST['email']);
            
            $dados = $usuario->recuperarSenha();
            
                $nome = addslashes($dados['nome']);
                $email = addslashes($dados['email']);
                
                $to = $email;
                $subject = "Recuperacao de Senha | Voluntarie.se";
                
                $body = "Ola, " .$nome. "\r\n". 
                        "sua senha: " .$dados['senha']. "\r\n". 
                $header = "From:trabalhos.si07@gmail.com";
                
                if(mail($to,$subject,$body,$header)) {
                    echo "<script>alert('A sua mensagem foi envada com sucesso! :)');</script>";
    
                } 
            
                else {
                    echo "<script>alert('Oops! Parece que algo deu errado! :(');</script>";
                }
                 $this->render('index', 'layout_index');

        }

    /*   */

    public function mensagemSuporte(){
        $this->view->retorno_Cadastro = '';
        $this->view->login = '';
        
        if(isset($_POST['email']) && !empty($_POST['email'])) {

            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $mensagem = addslashes($_POST['msg']);
        
            $to = "trabalhos.si07@gmail.com";
            $subject = "Suporte | Voluntarie.se";
            $body = "Nome: " .$nome. "\r\n". 
                    "Email: " .$email. "\r\n". 
                    "Mensagem: ".$mensagem;
            $header = "From:trabalhos.si07@gmail.com"."\r\n".
                      "Reply-To: ".$email."\e\n".
                      "X=Mailer:PHP/".phpversion();

            if(mail($to,$subject,$body,$header)) {
                echo "<script>alert('A sua mensagem foi envada com sucesso! :)');</script>";
            } 
        
            else {
                echo "<script>alert('Oops! Parece que algo deu errado! :(');</script>";
            }
        
        }

        $this->render('index', 'layout_index');

    }

}








?>