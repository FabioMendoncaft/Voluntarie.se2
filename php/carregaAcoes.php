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
                            </p id='dataCard' name='dataCard'>". date('d/m/Y H:i:s', strtotime($acoes->data_evento)) ."</p></button>
                            <div class='botoes-Cards mt-auto'>
                            <a class='btn btn-light botaoAcoesFeed corBotao' onclick='participar(". $acoes->id .")'>Participar</a>
                            <a class='btn btn-light botaoAcoesFeed corBotao editBtn' data-bs-toggle='modal' data-bs-target='#modalEdit_". $acoes->id ."''>Detalhes</a>
                            </div>
                        </div>
                    </div>                    
                </div>"; 
                }

?>

    <script type="text/javascript">
    
        function participar(id){
            location.href = 'php/acoes-controller.php?acao=participar&id='+ id;
        }

    </script>