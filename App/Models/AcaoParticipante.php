<?php 

namespace App\Models;

use MF\Model\Model;


class AcaoParticipante extends Model {

    private $id;
    private $id_usuario;
    private $id_acao;


    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo , $valor) {
        $this->$atributo = $valor;
    }


    public function participarAcao() {
       
        $query = "insert into acoes_participantes 
        (id_acao, id_usuario) values (:id_acao, :id_usuario)";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_acao', $this->__get('id_acao'));
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));

        $stmt->execute();

        return true;

    }

    public function deixarParticiparAcao() {
        $query = "delete from acoes_participantes where id_usuario = :id_usuario and id_acao = :id_acao";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_acao', $this->__get('id_acao'));
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));

        $stmt->execute();

        return true;
    }


    public function verificaParticipacao(){

        $query = "select id, id_acao , id_usuario from acoes_participantes
        where id_usuario = :id_usuario and id_acao = :id_acao";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_acao', $this->__get('id_acao'));
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);


    }

}


?>