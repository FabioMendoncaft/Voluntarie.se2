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






}


?>