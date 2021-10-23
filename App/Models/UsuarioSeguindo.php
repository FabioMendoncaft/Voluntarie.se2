<?php 

namespace App\Models;

use MF\Model\Model;


class UsuarioSeguindo extends Model {

    private $id;
    private $id_usuario_origem;
    private $id_usuario_destino;


    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo , $valor) {
        $this->$atributo = $valor;
    }



    public function seguirUsuario() {


        $query = "insert into tb_usuarios_seguindo (id_usuario_origem, id_usuario_destino)
                    values (:id_usuario_origem, :id_usuario_destino)";


        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario_origem' , $this->__get('id_usuario_origem'));
        $stmt->bindValue(':id_usuario_destino' , $this->__get('id_usuario_destino'));


        $stmt->execute();


        return true;


    }


    public function deixarDeSeguirUsuario() {


        $query = "delete from tb_usuarios_seguindo 
                where id_usuario_origem = :id_usuario_origem
                 and id_usuario_destino = :id_usuario_destino";

        $stmt = $this->db->prepare($query);
        
        $stmt->bindValue(':id_usuario_origem' , $this->__get('id_usuario_origem'));
        $stmt->bindValue(':id_usuario_destino' , $this->__get('id_usuario_destino'));



        $stmt->execute();


        return true;

    }
}

?>