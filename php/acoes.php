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
        return $thus->uf;
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
}

?>
