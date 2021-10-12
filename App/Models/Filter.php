<?php 

namespace App\Models;

use MF\Model\Model;

class Filter extends Model {

    private $id_usuario;
    private $estado;
    private $cidade;
    private $categoria;

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    //Recuperar as ações seguindo o filtro
    public function getaActionFilter () {

        $query = "select a.id,
                    a.id_usuario,
                    a.titulo,
                    a.descricao,
                    a.logradouro,
                    a.cidade, 
                    a.bairro, 
                    a.uf, 
                    a.complemento, 
                    a.data_criacao, 
                    a.data_evento, 
                    a.categoria, 
                    b.nome, 
                    (select 
                        count(*) from acoes_participantes c 
                        where c.id_usuario = :id_usuario and c.id_acao = a.id)  
                        as participando_sn
                        from tb_acoes a 
                        left join tb_usuarios b on a.id_usuario = b.id
                        where a.uf = :estado
                        and   a.categoria = :categoria
                        order by data_criacao desc";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario' , $_SESSION['id']);
        $stmt->bindValue(':estado' , $this->__get('estado'));
        $stmt->bindValue(':categoria' , $this->__get('categoria'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}


?>