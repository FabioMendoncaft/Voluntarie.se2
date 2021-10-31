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
        $op = 0;
        $where = "";

        //Filtro estado
        if (!empty($_POST['estado'])) {
            $where = "a.uf = :estado ";      
            $op = $op + 1;
        }

        //Filtro cidade
        if (!empty($_POST['cidade'])) {
            if ($op > 0) {
                $where = $where."and a.cidade = :cidade ";
            }else{
                $where = $where."a.cidade = :cidade ";
            }
            $op = $op + 1;      
        }

        //Filtro categoria
        if (!empty($_POST['categoria'])) {
            if ($op > 0) {
                $where = $where."and a.categoria = :categoria ";
            }else{
                $where = $where."a.categoria = :categoria ";
            }
            $op = $op + 1;
        }

        if (!empty($where)) {
            $where = "where ".$where;
        }

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
                        left join tb_usuarios b on a.id_usuario = b.id ".$where."
                        order by data_criacao desc";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario' , $_SESSION['id']);
        if (!empty($_POST['estado'])) {
           $stmt->bindValue(':estado' , $this->__get('estado'));
        }

        if (!empty($_POST['cidade'])) {
            $stmt->bindValue(':cidade' , $this->__get('cidade')); 
        }

        if (!empty($_POST['categoria'])) {
            $stmt->bindValue(':categoria' , $this->__get('categoria')); 
        }
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //Recuperar as ações seguindo o filtro
    public function readSelect () {
        $query = "select DISTINCT uf,
                                  cidade
                    from tb_acoes 
                   where uf = :estado";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':estado' , $this->__get('estado'));
        $stmt->execute();

        return  $stmt->fetchAll(\PDO::FETCH_OBJ);

    }
  
}


?>