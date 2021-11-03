<?php 

namespace App\Models;

use MF\Model\Model;


class Comentario extends Model {


    private $id;
    private $id_usuario;
    private $comentario;
    private $id_acao;
    


    public function __get($atributo) {
        return $this->$atributo;
    }


    public function __set($atributo, $valor) {
        $this->$atributo = $valor;

    }


    public function inserirComentario() {

        $query = "insert into tb_comentarios (id_acao, comentario, id_usuario) values (:id_acao, :comentario, :id_usuario) ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_acao', $this->__get('id_acao'));
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
        $stmt->bindValue(':comentario', $this->__get('comentario'));  

        $stmt->execute();

        return true;

    }


    public function recuperarComentarios(){

        $query = "select 
                        a.id,
                        a.id_acao,
                        a.comentario, 
                        a.id_usuario,
                        b.nome,
                        (select imagem_url from tb_imagem_perfil where id_usuario = a.id_usuario
                             order by data_criacao desc limit 1) as imagem_url  
                    from tb_comentarios a
                    inner join tb_usuarios b on a.id_usuario = b.id 
                where id_acao = :id_acao";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_acao', $this->__get('id_acao'));

        $stmt->execute();

        return  $stmt->fetchAll(\PDO::FETCH_OBJ);

    

    }

    public function excluirComentario() {

        $query = "delete from tb_comentarios where id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));
    
        $stmt->execute();



    }


    public function recuperarComentarioPorId() {

        $query = "select comentario from tb_comentarios where id= :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));

        $stmt->execute();

        return  $stmt->fetch(\PDO::FETCH_OBJ);


    }

    public function atualizaComentario(){

        $query = "update tb_comentarios set comentario = :comentario where id = :id";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->bindValue(':comentario', $this->__get('comentario'));

        $stmt->execute();

    }

}

?>