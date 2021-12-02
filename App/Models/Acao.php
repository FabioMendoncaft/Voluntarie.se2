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
    private $numero;
    private $data_criacao;
    private $data_evento;
    private $categoria;
    private $latitude;
    private $longitude;
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
                (id_usuario, titulo, descricao, logradouro, numero, cidade, bairro, uf, complemento, data_evento ,categoria, latitude, longitude ,imagem) 
                values 
                (:id_usuario, :titulo, :descricao, :logradouro, :numero, :cidade, :bairro, :uf, :complemento, :data_evento ,:categoria, :latitude, :longitude, :imagem)";        

        $stmt = $this->db->prepare($query);
        
        $stmt->bindValue(':id_usuario' , $this->__get('id_usuario'));
        $stmt->bindValue(':titulo' , $this->__get('titulo'));
        $stmt->bindValue(':descricao' , $this->__get('descricao'));
        $stmt->bindValue(':logradouro' , $this->__get('logradouro'));
        $stmt->bindValue(':numero' , $this->__get('numero'));
        $stmt->bindValue(':cidade' , $this->__get('cidade'));
        $stmt->bindValue(':bairro' , $this->__get('bairro'));
        $stmt->bindValue(':uf' , $this->__get('uf'));
        $stmt->bindValue(':complemento' , $this->__get('complemento'));
        $stmt->bindValue(':data_evento' , date('Y-m-d H:i:s', strtotime($this->__get('data_evento'))));
        $stmt->bindValue(':categoria' , $this->__get('categoria'));
        $stmt->bindValue(':latitude' , $this->__get('latitude'));
        $stmt->bindValue(':longitude' , $this->__get('longitude'));
        $stmt->bindValue(':imagem' , $this->__get('imagem'));

        $stmt->execute();

        return $this;
   
   

    }

    //Editar Ação

    public function editarAcao(){

        $query = "update tb_acoes 
                                set titulo = :titulo, 
                                descricao = :descricao, 
                                logradouro = :logradouro, 
                                cidade = :cidade, 
                                bairro = :bairro, 
                                uf = :uf, 
                                complemento = :complemento, 
                                numero = :numero, 
                                data_evento = :data_evento, 
                                categoria = :categoria,
                                latitude  = :latitude,
                                longitude = :longitude,
                                imagem = :imagem
                        where id = :id and id_usuario = :id_usuario; ";
        
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
        $stmt->bindValue(':titulo' , $this->__get('titulo'));
        $stmt->bindValue(':descricao' , $this->__get('descricao'));
        $stmt->bindValue(':logradouro' , $this->__get('logradouro'));
        $stmt->bindValue(':cidade' , $this->__get('cidade'));
        $stmt->bindValue(':bairro' , $this->__get('bairro'));
        $stmt->bindValue(':uf' , $this->__get('uf'));
        $stmt->bindValue(':complemento' , $this->__get('complemento'));
        $stmt->bindValue(':numero' , $this->__get('numero'));
        $stmt->bindValue(':data_evento' , date('Y-m-d H:i:s', strtotime($this->__get('data_evento'))));
        $stmt->bindValue(':categoria' , $this->__get('categoria'));
        $stmt->bindValue(':latitude' , $this->__get('latitude'));
        $stmt->bindValue(':longitude' , $this->__get('longitude'));
        $stmt->bindValue(':imagem' , $this->__get('imagem'));

        $stmt->execute();

        return $this;
        
    }

    // FIM - Editar Ação

    public function getAllMinhaAcao () {

        $query = "select    a.id, a.id_usuario,
                            a.titulo, a.descricao, 
                            a.logradouro, a.cidade, 
                            a.bairro, a.uf, a.complemento, 
                            a.data_evento, a.data_criacao ,
                            a.categoria, a.numero, a.imagem,
                            (SELECT count(*) from acoes_participantes where id_acao = a.id) as qtd_participantes
                from tb_acoes a where id_usuario = :id_usuario order by data_criacao desc";


        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Perfil2
    public function acoesPerfil2($id_usuario_logado){
        
        $query = "select    a.id, a.id_usuario,
                            a.titulo, a.descricao, 
                            a.logradouro, a.cidade, 
                            a.bairro, a.uf, a.complemento, 
                            a.data_evento, a.data_criacao ,
                            a.categoria, a.imagem, 
                            (select 
                                    count(*) from acoes_participantes c 
                                where c.id_usuario = :id_usuario_logado and c.id_acao = a.id)  as participando_sn,
                                (SELECT count(*) from acoes_participantes where id_acao = a.id) as qtd_participantes
                from tb_acoes a where a.id_usuario = :id_usuario order by a.data_criacao desc";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
        $stmt->bindValue(':id_usuario_logado' , $id_usuario_logado);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    // FIM - Perfil2
    
    public function delAcao() {

        $query = "delete from tb_acoes where id = :id and id_usuario = :id_usuario";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));

        $stmt->execute();

    }


        public function getAll() {

         /*   $query = "select a.*, b.nome from tb_acoes as a
                    left join tb_usuarios as b on a.id_usuario = b.id 
                    order by a.data_criacao desc"; */

           /* $query = "select a.id, a.id_usuario, a.titulo, a.descricao, a.logradouro, a.cidade, a.bairro, a.uf, a.complemento, a.data_criacao, a.data_evento, a.categoria, b.nome, (select count(*) from acoes_participantes where id_usuario = :id_usuario and id_acao = :id_acao) from tb_acoes a 
                    left join tb_usuarios b on a.id_usuario = b.id"; */

            $query = "select a.id,
                             a.id_usuario,
                             a.titulo,
                             a.descricao,
                             a.logradouro,
                             a.cidade, 
                             a.bairro, 
                             a.uf, 
                             a.complemento,
                             a.numero, 
                             a.data_criacao, 
                             a.data_evento, 
                             a.categoria,
                             a.imagem,
                             b.nome, 
                             (select 
                                    count(*) from acoes_participantes c 
                                where c.id_usuario = :id_usuario and c.id_acao = a.id)  as participando_sn,
                            (SELECT count(*) from acoes_participantes where id_acao = a.id) as qtd_participantes,   
                            (select imagem_url from tb_imagem_perfil where id_usuario = a.id_usuario
                             order by data_criacao desc limit 1)   as imagem_url 
                        from tb_acoes a 
            left join tb_usuarios b on a.id_usuario = b.id order by data_criacao desc";

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_usuario' , $_SESSION['id']);

            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);


        }
		
		public function allAcoesFeed(){

            $query = "select 
                            a.id, 
                            a.id_usuario,
                            b.nome,
                            b.telefone,
                            a.titulo,
                            a.data_evento,
                            a.categoria,
                            a.descricao,
                            a.latitude,
                            a.longitude
                    from tb_acoes a 
                    inner join tb_usuarios b on a.id_usuario = b.id      
                    order by data_criacao desc";
            $stmt = $this->db->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);

        }
}


?>