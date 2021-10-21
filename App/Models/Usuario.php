<?php 

namespace App\Models;

use MF\Model\Model;

class Usuario extends Model {

    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $senha;
    private $data_nascimento;
    private $sexo;

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    public function cadastrar() {

        $query = "insert into tb_usuarios
                 (nome, email, telefone, senha, data_nascimento, sexo)
                  values
                (:nome, :email, :telefone, :senha, :data_nascimento, :sexo)";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':telefone', $this->__get('telefone'));
        $stmt->bindValue(':senha', $this->__get('senha'));
        $stmt->bindValue(':data_nascimento', $this->__get('data_nascimento'));
        $stmt->bindValue(':sexo', $this->__get('sexo'));

        $stmt->execute();

        return $this;

    }

     //Editar usuário
     public function editarUser() {

        $query = "update tb_usuarios set nome = :nome, telefone = :telefone, 
        data_nascimento = :data_nascimento, sexo = :sexo where id = :id; ";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id' , $this->__get('id'));
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':telefone', $this->__get('telefone'));
        $stmt->bindValue(':data_nascimento', $this->__get('data_nascimento'));
        $stmt->bindValue(':sexo', $this->__get('sexo'));

        $stmt->execute();

        return $this;

    }
    //Editar usuário

    public function getUsuarioPorEmail() {

        $query = "select nome, email from tb_usuarios where email = :email";

      /*  $query = "select  a.id ,a.nome, a.email, a.telefone, a.sexo ,count(b.id) as n_acoes from tb_usuarios as a
                    left join tb_acoes as b on a.id = b.id_usuario
        where a.email = :email "; */

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->__get('email'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

        
    }

    public function autenticar(){

        $query = "select id, nome, email from tb_usuarios where email = :email and senha = :senha";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':senha', $this->__get('senha'));

        $stmt->execute();

        $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

        if(!empty($usuario['id']) && !empty($usuario['nome']) ) {
            $this->__set('id', $usuario['id']);
            $this->__set('nome', $usuario['nome']);
            $this->__set('email', $usuario['email']);
        }

        return $this;

    }
    
    public function recuperarSenha() {

        $query = "select id, email, nome, senha from tb_usuarios where email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->__get('email'));

        $stmt->execute();

        $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);
       
        if(!empty($usuario['id']) && !empty($usuario['email']) ) {
            $this->__set('id', $usuario['id']);
            $this->__set('email', $usuario['email']);
            $this->__set('senha', $usuario['senha']);
            
        }
        
        return $this;
    }

    public function mudarSenha(){

        $query = "update tb_usuarios 
                        set senha = :senha 
                        where id = :id";

           $stmt = $this->db->prepare($query);
           $stmt->bindValue(':senha', $this->__get('senha'));    
           $stmt->bindValue(':id', $this->__get('id'));          

            $stmt->execute();
            
    }


    
    public function getDadosUsuario() {

        $query = "select  a.id ,a.nome, a.email, a.telefone, a.data_nascimento, a.sexo ,count(b.id) as n_acoes  from tb_usuarios as a
                    left join tb_acoes as b on a.id = b.id_usuario
        where a.email = :email ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->__get('email'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

        
    }

    public function acoesParticipo() {

        $query = "select a.id as id_acoes_participante, b.* , 
                (select imagem_url from tb_imagem_perfil where id_usuario = b.id_usuario
                order by data_criacao desc limit 1)   as imagem_url,
                c.nome, 
                (SELECT count(*) from acoes_participantes where id_acao = a.id_acao) as qtd_participantes
                from acoes_participantes a
            inner join tb_acoes b on a.id_acao = b.id 
            inner join tb_usuarios c on b.id_usuario = c.id
        where a.id_usuario = :id_usuario";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);


    }

    public function usuarioPerfil2(){

        $query = "select  a.id ,a.nome, a.email, a.telefone, a.data_nascimento, a.sexo ,count(b.id) as n_acoes  from tb_usuarios as a
        left join tb_acoes as b on a.id = b.id_usuario
        where a.id = :id ";

        $stmt = $this->db->prepare($query);
         $stmt->bindValue(':id', $this->__get('id'));   

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
	
	public function pesquisarUsuario() {



        $query = "select u.id, 
                        u.nome, 
                        u.email, 
                        (select count(*) from tb_usuarios_seguindo where id_usuario_origem = :id
                         and id_usuario_destino = u.id) as seguindo_sn
                from tb_usuarios as u where nome like :nome and id <> :id" ;

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', '%' . $this->__get('nome') . '%');
        $stmt->bindValue(':id' , $this->__get('id'));

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

}


?>