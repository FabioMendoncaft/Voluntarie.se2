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

    public function usuarioDestino(){

        $query = "select a.id_usuario_destino, 
                 (select nome from tb_usuarios where id = a.id_usuario_destino) as seguindo
                 from tb_usuarios_seguindo a where id_usuario_origem = :id_usuario_origem" ;

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario_origem' , $this->__get('id_usuario_origem'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function usuarioOrigem(){
        
        $query = "select a.id_usuario_origem, 
                 (select nome from tb_usuarios where id = a.id_usuario_origem) as seguidores,
                 (select u.id from tb_usuarios as u where id = a.id_usuario_origem) as id_seguidores,
                 (select count(*) from tb_usuarios_seguindo where id_usuario_origem = :id_usuario_destino and id_usuario_destino = id_seguidores) as seguindo_sn
                 from tb_usuarios_seguindo a where id_usuario_destino = :id_usuario_destino" ;

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario_destino' , $this->__get('id_usuario_destino'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);   

    }
}

?>