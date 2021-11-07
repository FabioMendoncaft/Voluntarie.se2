<?php 

namespace App\Models;

use MF\Model\Model;


class Imagem extends Model {


    private $id;
    private $id_usuario;
    private $imagem_url;
    private $imagem_nome;



    public function __get($atributo) {
        return $this->$atributo;
    } 



    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }


    public function validaImagemPerfil() {

        if( isset($_FILES['imagem_perfil'])) {

            $img_nome = $_FILES['imagem_perfil']['name'] ;
            $img_tamanho = $_FILES['imagem_perfil']['size'];
            $img_tmp_name = $_FILES['imagem_perfil']['tmp_name'];
            $img_erro = $_FILES['imagem_perfil']['error'];

            if($img_erro === 0) {
                if($img_tamanho > 5000000) {
                    //seu arquivo é maior que 5MB erro
                    
                    $img_erro_tamanho = 'erro tamanho';
                    return $img_erro_tamanho;
                    
                }else {
                    $img_extensao = pathinfo($img_nome , PATHINFO_EXTENSION);
                    $img_ext_lc = strtolower($img_extensao);

                    $extensoes_permitidas = array("jpg" , "jpeg" , "png");

                        if ( in_array($img_ext_lc , $extensoes_permitidas) ) {
                            $img_novo_nome = uniqid("IMG-", true) . "." . $img_ext_lc;
                            $img_upload_caminho = "upload/perfil/" . $img_novo_nome;
                            move_uploaded_file($img_tmp_name, $img_upload_caminho );

                            $this->__set('imagem_nome' , $img_novo_nome );
                            $this->inserirImagem();

                        }else {
                            $img_erro_extensao = 'erro extensao';
                            return $img_erro_extensao;
                        }
                }

            }

        }

    }


    public function inserirImagem() {

        $query = "insert into tb_imagem_perfil (id_usuario, imagem_url) values (:id_usuario , :imagem_url)";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario' , $this->__get('id_usuario'));
        $stmt->bindValue(':imagem_url' ,  $this->__get('imagem_nome'));

        $stmt->execute(); 

    }

    public function recuperarImagem() {

        $query = "select id, id_usuario, imagem_url from tb_imagem_perfil where id_usuario = :id_usuario
        order by data_criacao desc limit 1";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario' , $this->__get('id_usuario'));
       
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }


    public function validaImagemAcao() {

        if( isset($_FILES['imagem_acao'])) {

            $img_nome = $_FILES['imagem_acao']['name'] ;
            $img_tamanho = $_FILES['imagem_acao']['size'];
            $img_tmp_name = $_FILES['imagem_acao']['tmp_name'];
            $img_erro = $_FILES['imagem_acao']['error'];

            if($img_erro === 0) {
                if($img_tamanho > 5000000) {
                    //seu arquivo é maior que 5MB erro

                    $img_erro_tamanho = 'erro tamanho';
                    return $img_erro_tamanho;

                }else {
                    $img_extensao = pathinfo($img_nome , PATHINFO_EXTENSION);
                    $img_ext_lc = strtolower($img_extensao);


                    $extensoes_permitidas = array("jpg" , "jpeg" , "png");

                        if ( in_array($img_ext_lc , $extensoes_permitidas) ) {
                            $img_novo_nome = uniqid("IMG-", true) . "." . $img_ext_lc;
                            $img_upload_caminho = "upload/acao/" . $img_novo_nome;
                            move_uploaded_file($img_tmp_name, $img_upload_caminho );

                            return $img_novo_nome;

                        }else {

                            $img_erro_extensao = 'erro extensao';
                            return $img_erro_extensao;

                        }

                }

            }

        }

    }

}


?>