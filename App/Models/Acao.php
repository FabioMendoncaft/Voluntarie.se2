<?php 

namespace App\Models;

use MF\Model\Model;


class Acao extends Model {

    private $id;
    private $id_usuario;
    private $titulo;
    private $descricao;
    private $logradouro;
    private $cidade;
    private $bairro;
    private $uf;
    private $complemento;
    private $data_criacao;
    private $data_evento;
    private $categoria;
    private $imagem;


    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }


    public function addAcao(){

        $query = "insert into 
                        tb_acoes 
                (id_usuario, titulo, descricao, logradouro, cidade, bairro, uf, complemento, data_evento ,categoria, imagem) 
                values 
                (:id_usuario, :titulo, :descricao, :logradouro, :cidade, :bairro, :uf, :complemento, :data_evento ,:categoria, :imagem)";        

        $stmt = $this->db->prepare($query);
        
        $stmt->bindValue(':id_usuario' , $this->__get('id_usuario'));
        $stmt->bindValue(':titulo' , $this->__get('titulo'));
        $stmt->bindValue(':descricao' , $this->__get('descricao'));
        $stmt->bindValue(':logradouro' , $this->__get('logradouro'));
        $stmt->bindValue(':cidade' , $this->__get('cidade'));
        $stmt->bindValue(':bairro' , $this->__get('bairro'));
        $stmt->bindValue(':uf' , $this->__get('uf'));
        $stmt->bindValue(':complemento' , $this->__get('complemento'));
        $stmt->bindValue(':data_evento' , date('Y-m-d H:i:s', strtotime($this->__get('data_evento'))));
        $stmt->bindValue(':categoria' , $this->__get('categoria'));
        $stmt->bindValue(':imagem' , $this->__get('imagem'));

        $stmt->execute();

        move_uploaded_file($_FILES['imagem']['tmp_name'], "upload/" . $this->__get('imagem'));

        return $this;
   

    }

    public function getAllMinhaAcao () {

        $query = "select    id, id_usuario,
                            titulo, descricao, 
                            logradouro, cidade, 
                            bairro, uf, complemento, 
                            data_evento, data_criacao ,
                            categoria, imagem
                from tb_acoes where id_usuario = :id_usuario order by data_criacao desc";


        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

        public function delAcao() {

            $query = "delete from tb_acoes where id = :id and id_usuario = :id_usuario";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id', $this->__get('id'));
            $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));

            $stmt->execute();

        }


        public function getAll() {

            $query = "select a.*, b.nome from tb_acoes as a
                    left join tb_usuarios as b on a.id_usuario = b.id";
            $stmt = $this->db->prepare($query);

            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);


        }
}


?>