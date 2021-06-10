<?php


Class Usuario{

    //atributos

	private $id, $nome, $email, $telefone, $senha, $data_nascimento, $sexo, $tipo, $conexao;

 
    public function __construct(Conexao $conexao) {
		$this->conexao = $conexao->conectar();
	}


   //metodos getters e setters
        public function getId(){
            return $this->id;
        }
    
        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getNome()
        {
            return $this->nome;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function setTelefone($telefone){
            $this->telefone = $telefone;
        }

        public function getTelefone()
        {
            return $this->telefone;
        }

        public function setSenha($senha){
            $this->senha = $senha;
        }

        public function getSenha()
        {
            return $this->senha;
        }

        public function setData($data_nascimento){
            $this->data_nascimento = $data_nascimento;
        }

        public function getData()
        {
            return $this->data_nascimento;
        }

        public function setSexo($sexo){
            $this->sexo = $sexo;
        }

        public function getSexo()
        {
            return $this->sexo;
        }

    public function cadastrar(){

        $retorno = $this->verificaCadastro();

        if($retorno == 'nao existe') {

            $query = 'insert into tb_usuarios (nome, email, telefone, senha, data_nascimento, sexo) 
                    values (:nome, :email, :telefone, :senha, :data_nascimento, :sexo)';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':nome', $this->getNome());
            $stmt->bindValue(':email', $this->getEmail());
            $stmt->bindValue(':telefone', $this->getTelefone());
            $stmt->bindValue(':senha', $this->getSenha());
            $stmt->bindValue(':data_nascimento', $this->getData());
            $stmt->bindValue(':sexo', $this->getSexo());
            
            $teste = $stmt->execute();
            return $retorno;

        } else {
            return $retorno;
        }
        
        
    }

    public function logar(){

        $query = 'select id, nome, email, telefone, senha, data_nascimento, sexo from tb_usuarios where email = :email and senha = :senha';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':email', $this->getEmail());
        $stmt->bindValue(':senha', $this->getSenha());

        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if(empty(!$resultado)) {
           $_SESSION['id_usuario']    = $resultado['id']; 
           $_SESSION['nome']          = $resultado['nome'];
           $_SESSION['email']         = $resultado['email'];
           $_SESSION['telefone']      = $resultado['telefone'];
           $_SESSION['data_nascimento'] = $resultado['dt_nascimento'];
           $_SESSION['sexo']          = $resultado['sexo'];
            return 'ok';
        } else {
            return 'email ou senha invalidos';
        }

    }   

    public function verificaCadastro() {
        
        $query = 'select email from tb_usuarios where email = :email';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':email', $this->getEmail());
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_OBJ);

        if(empty(!$resultado)) {
            return 'existe';
        } else {
            return 'nao existe';
        }

    }
    
}

?>