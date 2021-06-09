<?php 
session_start();
require 'conexao.php';
require 'acoes.php';

$conexao = new Conexao();
$acao = new Acoes($conexao);
$acao->setId_usuario($_SESSION['id_usuario']);

$minha_acao = $acao->listaAcoes();

    echo "
            <div style='margin-bottom: 15px;'class='row row-cols-1 row-cols-md-3 g-4'>";
            foreach($minha_acao as $indice => $acoes) {
    echo "      <div class='col'>
                    <div class='card h-100'>
                        <button style='border: 0px;'' class='editBtn'><img src='img/acaoSocial2.jpg' class='card-img-top' alt='...''></button>
                        <div class='card-body d-flex flex-column align-items-left'>
                            <button style='text-align: left; border: 0px; background: transparent;' class='editBtn'><h5 class='card-title'>". $acoes->titulo ."</h5>
                            <p class='card-text'>". $acoes->descricao ."</p>
                            </p id='dataCard' name='dataCard'>". $acoes->data_evento ."</p></button>
                            <a href='#' class='btn btn-light corBotao mt-auto participar ptr'>Participar</a>
                        </div>
                    </div>                    
                </div>"; 
                }

?>