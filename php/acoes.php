<?php 

Class Acoes {

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
   private $qtd_part;

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

   public function __construct(Conexao $conexao) {
        $this->conexao = $conexao->conectar();
    }

    public function setId_usuario($id_usuario){
        $this->id_usuario = $id_usuario;
    }

    public function getId_usuario(){
        return $this->id_usuario;
    }
    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setLogradouro($logradouro){
        $this->logradouro = $logradouro;
    }

    public function getLogradouro(){
        return $this->logradouro;
    }

    public function SetCidade($cidade){
        $this->cidade = $cidade;
    }

    public function getCidade(){
        return $this->cidade;
    }

    public function setBairro($bairro){
        $this->bairro = $bairro;
    }

    public function getBairro(){
        return $this->bairro;
    }

    public function setUf($uf){
        $this->uf = $uf;
    } 

    public function getUf(){
        return $this->uf;
    }

    public function setComplemento($complemento){
        $this->complemento = $complemento;
    }

    public function getComplemento(){
        return $this->complemento;
    }

    public function setData($data_evento){
        $this->data_evento = $data_evento;
    }

    public function getData(){
        return $this->data_evento;
    }

    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }
    
    public function getCategoria(){
        return $this->categoria;
    }

    public function setImagem($imagem){
        $this->imagem = $imagem;
    }

    public function getImagem(){
        return $this->imagem;
    }

    public function setQtdPart($qtd_part){
        $this->qtd_part = $qtd_part;
    }

    public function getQtdPart(){
        return $this->qtd_part;
    }

    public function criarAcao(){
        
        $query = 'insert into tb_acoes 
                (id_usuario, titulo, descricao, logradouro, cidade, bairro, uf,
                complemento, data_evento, categoria, imagem) 
                values (:id_usuario, :titulo, :descricao, :logradouro, :cidade, :bairro, :uf,
                :complemento, :data_evento, :categoria, :imagem )';
                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(':id_usuario', $this->getId_usuario());
                $stmt->bindValue(':titulo', $this->getTitulo());
                $stmt->bindValue(':descricao', $this->getDescricao());
                $stmt->bindValue(':logradouro', $this->getLogradouro());
                $stmt->bindValue(':cidade', $this->getCidade());
                $stmt->bindValue(':bairro', $this->getBairro());
                $stmt->bindValue(':uf', $this->getUf());
                $stmt->bindValue(':complemento', $this->getComplemento());
                $stmt->bindValue(':categoria', $this->getCategoria());
                $stmt->bindValue(':imagem', $this->getImagem());
                $stmt->bindValue(':data_evento', $this->getData());

                $stmt->execute();
    }

    public function editarAcao(){

        $nova = "update tb_acoes set titulo = :titulo, descricao = :descricao, logradouro = :logradouro, cidade = :cidade,bairro = :bairro,uf = :uf,complemento = :complemento, data_evento = :data_evento, categoria = :categoria where id = :id; ";
                $stmt = $this->conexao->prepare($nova);
                $stmt->bindValue(':titulo', $this->getTitulo());
                $stmt->bindValue(':descricao', $this->getDescricao());
                $stmt->bindValue(':logradouro', $this->getLogradouro());
                $stmt->bindValue(':cidade', $this->getCidade());
                $stmt->bindValue(':bairro', $this->getBairro());
                $stmt->bindValue(':uf', $this->getUf());
                $stmt->bindValue(':complemento', $this->getComplemento());
                $stmt->bindValue(':data_evento', $this->getData());
                $stmt->bindValue(':categoria', $this->getCategoria());
                $stmt->bindValue(':id',  $this->getId());      
                $stmt->execute();
    }

    public function excluirAcao(){

        $query = 'delete from tb_acoes where id = :id';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id',  $this->getId());

        $stmt->execute();

    }

    public function listarMinhaAcao(){

        $query = 'select id,id_usuario,titulo,descricao,logradouro,cidade,bairro,uf,complemento,data_criacao, qtd_part,DATE_FORMAT(data_evento, "%d/%m/%Y") as data_evento,categoria,imagem from tb_acoes where id_usuario = :id_usuario';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_usuario', $this->getId_usuario());
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }
    public function ListaAcoes(){

        $query = 'SELECT * FROM tb_acoes ORDER BY id DESC ';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }   
    public function ParticipaAcoes(){

        $query = 'SELECT qtd_part FROM tb_acoes WHERE id = :id';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $this->getId());
        $stmt->execute();

        $teste =  $stmt->fetchAll(PDO::FETCH_OBJ);

        foreach($teste as $indice => $retorno){
            $participante = $retorno->qtd_part; 

            $query2 = 'update tb_acoes set qtd_part = :qtd_part where id = :id';
            $stmt = $this->conexao->prepare($query2);
            $stmt->bindValue(':id', $this->getId());
            $stmt->bindValue(':qtd_part', $this->getQtdPart() + $participante);

            $stmt->execute();
            
        }
    
    }     

} 

?>
