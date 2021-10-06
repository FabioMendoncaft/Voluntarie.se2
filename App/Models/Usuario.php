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

    public function getUsuarioPorEmail() {

        $query = "select  a.id ,a.nome, a.email, a.telefone, a.sexo ,count(b.id) as n_acoes from tb_usuarios as a
                    left join tb_acoes as b on a.id = b.id_usuario
        where a.email = :email ";

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

}


?>