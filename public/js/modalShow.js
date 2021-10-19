function showDetails(idAction, idUsuario){
    
    $.ajax({
        type: 'post',
        url: '/action_info',
        data: { id_acao: idAction, id_usuario: idUsuario},
        success: function (data){
            data = JSON.parse(data);
            data.forEach(function (item) {
                var content = document.getElementById("modalContent");
                var img = '';
                var check = '';

                // Verificar se possuí imagem, se não, define uma padrão
                if(item.imagem != null){
                    img = item.imagem;
                }else{
                    img = 'default.jpg';
                }

                // Converter a data
                var dataInput = item.data_evento;
                data = new Date(dataInput);
                dataFormatada = data.toLocaleDateString('pt-BR', {timeZone: 'UTC'});

               
                content.innerHTML = 
                '<div class="modal-content">\
                <div class="modal-header">\
                <h5 class="modal-title"> <h5 class="card-title text-light"> '+item.titulo+' </h5></h5>\
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>\
                </div>\
                <form class="form">\
                    <div class="modal-body">\
                        <img src="upload/acao/'+img+'" class="card-img-top" alt="...">\
                        <div class="card-body">\
                            <p class="qtd_part text-light">'+item.participando_sn+'</p>\
                            <span class="material-icons qtd_part_ic text-light">person</span>\
                            <p class="card-text text-light">'+item.descricao+'</p>\
                            <p class="text-light">Data: '+dataFormatada+'</p>\
                            <label>\
                                <p class="text-light">Endereço: </p>\
                                <p id="ruaModal" name="ruaModal" class="text-light"> '+item.logradouro+', </p> \
                            </label>\
                            <label>\
                                <p id="numModal" name="numModal" class="text-light"> '+item.complemento+', </p>\
                            </label>\
                            <label>\
                                <p id="cepModal" name="cepModal" class="cepNum text-light"> '+item.bairro+', </p> \
                            </label>\
                            <label>\
                                <p id="bairroModal" name="bairroModal" class="text-light">'+item.cidade+'</p>\
                            </label>\
                            <label>\
                                <p id="cidadeModal" name="cidadeModal" class="cidadeNum text-light">'+item.uf+'</p>\
                            </label>\
                        </div>\
                    </div>\
                    </form>\ <div class="modal-footer">\
                    </div>\
                </div>\
                ';

            console.log(typeof(item.imagem));
            });

            
        }

    });     
}