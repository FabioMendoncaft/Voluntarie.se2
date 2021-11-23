function enviarComentario(valor) {
    
    let id_acao = valor

    let txt_comentario = $(`#textbox-comentario-${id_acao}`).val();
    console.log(txt_comentario);

    if(txt_comentario.trim() != '') {

        $.ajax({
            url: '/enviar_comentario',
            type: "POST",
            data: {
                comentario: txt_comentario,
                acao: id_acao
            },
            beforeSend: function () {
                $(`#resposta-${id_acao}`).html("Enviando...");
            }
        }).done(function (e) {
            $(`#resposta-${id_acao}`).html("Comentario feito com sucesso");
            $(`#textbox-comentario-${id_acao}`).val("");
            buscarComentarios(id_acao);
            
            let caixa_comentarios = $(`.comentarios-${id_acao}`);
            caixa_comentarios.html("");
 
        })
    }
}

function ocultarComentarios(id_acao) {

    let caixa_comentarios = $(`.comentarios-${id_acao}`);
    caixa_comentarios.html("");

    $(`#btn-mostrar-comentario${id_acao}`).css('display', 'block');
    $(`#btn-ocultar-comentario${id_acao}`).css('display', 'none');

}

function buscarComentarios(valor) {

    let id_acao = valor;

    $.ajax({
        type: 'POST',
        url: '/comentarios',
        dataType: 'json',
        data: { acao: id_acao },
        success: function (data) {

            data.forEach(element => {

                let id_usuario_logado = $(`#id_usuario_logado`).val();

                let bnt_editar = $(`#editar-${element.id_usuario}`)
                let btn_deletar = $(`#deletar-${element.id_usuario}`)


                $(`.comentarios-${id_acao}`).prepend(`
                <div class="w-100 mt-3 box-comentario">
                    <div id="caixa-imagem-comentario" >
                    <img id="${element.id}" style="width: 35px; height: 35px;  float: left;" src="upload/perfil/${element.imagem_url}" alt="" class="img-fluid rounded-circle mt-1 fotoComentario"></img>    
                    </div>
                        <div  class="caixaComentarios">
                            <div style=" float: right; font-size: 13px;" class="editar_excluir-${element.id_usuario}">
                                <span id="editar-${element.id_usuario}" style="cursor: pointer; text-decoration: underline;" onclick="editarComentario(${element.id},${id_acao})" >Editar |</span>
                                <span id="deletar-${element.id_usuario}" style="cursor: pointer; text-decoration: underline;;" onclick="deletarComentario(${element.id},${id_acao})" >Deletar</span>
                                    
                            </div>
                            <label class="nomeComentario">${element.nome}</label>
                            <p id="cx_comentarios">${element.comentario}</p>
                            </div>
                        </div>
                    </div>`)

                    if (element.imagem_url == '' || element.imagem_url == null) {
                        $(`#${element.id}`).attr("src", "img/íconePerfil.jpg");
                    }

                    let btn_editar_excluir = $(`.editar_excluir-${element.id_usuario}`)

                    if(id_usuario_logado == element.id_usuario) {
                        btn_editar_excluir.show()
                       // btn_editar_excluir.append(`<span id="editar-${element.id_usuario}" style="cursor: pointer;" onclick="editarComentario(${element.id},${id_acao})" >Editar |</span>
                         //                           <span id="deletar-${element.id_usuario}" style="cursor: pointer;" onclick="deletarComentario(${element.id},${id_acao})" >Deletar</span>`)
                    }else {
                        btn_editar_excluir.html("")
                    }

            })

            $(`#btn-mostrar-comentario${id_acao}`).css('display', 'none');
            $(`#btn-ocultar-comentario${id_acao}`).css('display', 'block');

           // preventDefault();
        },
        error: function (data) {
            console.log(data);
        }

    })

}

function editarComentario(valor, valor2) {

    $(document).ready(function($){
   
        let id_comentario = valor;
        let id_acao = valor2;

        $.ajax({
            url: '/get_coment_by_id',
            type: "POST",
            dataType: 'json',
            data: { id: id_comentario },
            success: function (data) {

                let txt_input = $(`#textbox-comentario-${id_acao}`);
                txt_input.val(data.comentario);

                let caixa_atualizar = $(`#div-atualizar-${id_acao}`);
                caixa_atualizar.html(`<button onclick="atualizarComentario(${id_comentario}, ${id_acao})" class="btn corBotao" id="atualizar-comentario-${id_acao}" >
                                        <span class="material-icons text-light mt-1">update</span>
                                    </button>`);


                $(`#botao-comentario-${id_acao}`).css('display', 'none');
                $(`#atualizar-comentario-${id_acao}`).css('display', 'block');
            },
            error: function (data) {
                console.log(data);
            }
        }).done(function(e){

        })
    })
}

function atualizarComentario(valor, valor2){

    console.log('passou aqui')
    let id_comentario = valor;
    let id_acao =valor2;

    let input_atualizado = $(`#textbox-comentario-${id_acao}`).val();
    console.log(input_atualizado);

    $.ajax({
        url: '/editando_comentario',
        type: "POST",
        data: {id: id_comentario ,
               comentario: input_atualizado },
        beforeSend : function(){
            $(`#resposta-${id_acao}`).html("Enviando...");
        }
    }).done(function(e){
        $(`#resposta-${id_acao}`).html("atualizado com sucesso");

        $(`#textbox-comentario-${id_acao}`).val("");

        $(`#botao-comentario-${id_acao}`).css('display', 'block');
        $(`#atualizar-comentario-${id_acao}`).css('display', 'none');

        buscarComentarios(id_acao);
        $(`.comentarios-${id_acao}`).html("");

    })

    
}

function deletarComentario(valor, valor2) {

    let id_comentario = valor;
    let id_acao = valor2;

    $.ajax({
        url: '/deletar_comentario',
        type: "POST",
        data: { id: id_comentario },
        success: function (data) {
            console.log(data);
        },
        error: function (data) {
            console.log(data);
        }
    }).done(function (e) {
        $(`.comentarios-${id_acao}`).html("");
        buscarComentarios(id_acao);


    })
}

function comboxSelect(select) {

  var estado = select.value;  
  console.log(estado);

    $.ajax({
        type: 'POST',
        url: '/comboxSelect',
        dataType: 'json',
        data: { estado: estado },
        success: function (data) {
            console.log(data);
            var option = '<option disabled="disabled" selected="selected">-Selecione uma opção</option>';
            for (var i = data.length - 1; i >= 0; i--) { 
                option += '<option value ="' + data[i]['cidade'] + '">' + data[i]['cidade'] + '</option>'; 
            }
            $('#cidade').html(option).show();
        },
        error: function (data) {
            console.log(data);
        }

    })

}

function participar(value) {
    var id_acao = value;
    var action = "participar";

    $.ajax({
        type: 'POST',
        url: '/action',
        dataType: 'json',
        data: { id_acao: id_acao,
                action:  action
        },
        success: function (data) {
            console.log(data);
        },
        error: function (data) {
            console.log(data);
        }      
    })
    $(`#btn-deixar_participar${id_acao}`).css('display', 'block');
    $(`#btn-participar${id_acao}`).css('display', 'none'); 

    let qtd_partcipantes = document.getElementById(`qtd_part${id_acao}`).innerHTML;
    qtd_partcipantes+= 1;
    var qtd = parseInt(qtd_partcipantes);
    document.getElementById(`qtd_part${id_acao}`).innerHTML = qtd;
    
}

function removeParticipar(value) {
    var id_acao = value;
    var action = "deixar_de_participar";

    $.ajax({
        type: 'POST',
        url: '/action',
        dataType: 'json',
        data: { id_acao: id_acao,
                action:  action
        },
        success: function (data) {
            console.log(data);
        },
        error: function (data) {
            console.log(data);
        }
    })
    $(`#btn-participar${id_acao}`).css('display', 'block');
    $(`#btn-deixar_participar${id_acao}`).css('display', 'none');

    let qtd_partcipantes = document.getElementById(`qtd_part${id_acao}`).innerHTML;
    console.log(qtd_partcipantes);
    if (qtd_partcipantes > 0) {
        qtd_partcipantes-= 1;
        var qtd = parseInt(qtd_partcipantes);
        document.getElementById(`qtd_part${id_acao}`).innerHTML = qtd;       
    }

}