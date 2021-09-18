<?php 

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;


class AppController extends Action {

    public function feed() {
        session_start();

        if(!empty($_SESSION['id']) && !empty($_SESSION['nome'])) {
            $this->render('feed', 'layout_app');
        } else {
            header('Location: /');
        }
    }



}    

?>