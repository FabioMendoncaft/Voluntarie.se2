function enviarComentario(valor) {

    let id_acao = valor

    let txt_comentario = $(`#textbox-comentario-${id_acao}`).val();
    console.log(txt_comentario);

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
        buscarComentarios(id_acao);
        $(`#textbox-comentario-${id_acao}`).val("");
    })
 
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
            let caixa_comentarios = $(`.comentarios-${id_acao}`);
            caixa_comentarios.html("");

            data.forEach(element => {
                let comentario = $(".box-comentario")[0].cloneNode(true);

                comentario = $(comentario)
                comentario.find("#cx_comentarios").text(element.comentario)
                comentario.find(".nomeComentario").text(element.nome)
                comentario.removeClass(".box-comentario");
                comentario.css('display', 'block');
                caixa_comentarios.append(comentario);
                
                let imagem = `<img id="${element.id}" style="width: 35px; height: 35px;  float: left;" src="upload/perfil/${element.imagem_url}" alt="" class="img-fluid rounded-circle mt-1 fotoComentario"></img>`
                let caixa_imagem = comentario.find(`#caixa-imagem-comentario`);
                caixa_imagem.html("");
                caixa_imagem.append(imagem);
                
                let id_usuario_logado = $(`#id_usuario_logado`).val();
                let btn_editar_excluir = comentario.find(".editar_excluir");
                btn_editar_excluir.show();

                if(id_usuario_logado !== element.id_usuario){
                    btn_editar_excluir.hide();
                    
                }

                btn_editar_excluir.html(`<span id="${element.id}" style="cursor: pointer;" onclick=(editarComentario(${element.id},${id_acao})) >Editar |</span>
                    <span id="${element.id}" style="cursor: pointer;" onclick=(deletarComentario(${element.id},${id_acao})) >Deletar</span>  `)

            });

            $(`#btn-mostrar-comentario${id_acao}`).css('display', 'none');
            $(`#btn-ocultar-comentario${id_acao}`).css('display', 'block');
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
            console.log(data);

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
