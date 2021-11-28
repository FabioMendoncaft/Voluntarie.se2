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

    public function participantesAcoes(){

        $query = "select a.id,
                         a.id_acao,
                         a.id_usuario,
                         (select nome from tb_usuarios where id = a.id_usuario) as nome,
                         (select imagem_url from tb_imagem_perfil where id_usuario = a.id_usuario
                         order by data_criacao desc limit 1) as imagem_url 
                         from acoes_participantes a 
                         where id_acao = :id_acao "; 
                         
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_acao', $this->__get('id_acao'));    
        
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }
}


?>