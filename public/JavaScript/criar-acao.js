function endereco(){
    var cep = document.getElementById('cep')
    var url = "https://viacep.com.br/ws/" + cep.value + "/json/"
    var logradouro = document.getElementById('logradouro')
    var bairro = document.getElementById('bairro')
    var localidade = document.getElementById('localidade')
    var uf = document.getElementById('uf')

    fetch(url, {method: 'GET'})
        .then(response => {
            response.json()
                .then(data => {
                    logradouro.value = data.logradouro
                    bairro.value = data.bairro
                    localidade.value = data.localidade
                    uf.value = data.uf
                })
        })
        .catch(erro =>{
            logradouro.value = ""
            bairro.value = ""
            localidade.value = "" 
            uf.value = ""
            alert("CEP não encontrado!")
        })
}

function previewImagem(){
    var imagem = document.querySelector('input[name=imagem_acao]').files[0]
    var preview = document.querySelector('img[name=imagem]')
    var reader = new FileReader();

    reader.onloadend = function(){
        preview.src = reader.result
    }

    if (imagem){
        reader.readAsDataURL(imagem)
    }else{
        preview.src = " "
    }
}

$(document).ready(function() {
    $("#cep").mask("00000-000")
})

$(document).ready(function() {
    $("#criarAcao").validate({
        rules: {
            titulo: {
                required: true,
            },
            descricao: {
                required: true,
            },
            data: {
                required: true,
            }
        },
    })
})
$(document).ready(function() {
    $("#quadrado").validate({
        rules: {
            logradouro: {
                required: true,
            },
            bairro: {
                required: true,
            },
            cidade: {
                required: true,
            },
            uf: {
                required: true,
            },
            categoria: {
                required: true,
            }
        },
    })
})
 

function fazGet(url) {
    let ajax = new XMLHttpRequest();
    ajax.open('GET', url, false);
    ajax.send();
    
    return ajax.responseText;
}

function pegarEndereco(){

    var logradouro = document.getElementById('logradouro').value
    var bairro = document.getElementById('bairro').value
    var numero = document.getElementById('numero').value
    var cidade = document.getElementById('localidade').value // cidade
    var uf = document.getElementById('uf').value

    var endereco_completo = logradouro + ', ' + numero + ' - ' + bairro + ' ' + cidade + ' ' + uf

    alert(endereco_completo);

    data = fazGet(`https://maps.googleapis.com/maps/api/geocode/json?address=${endereco_completo}&key=AIzaSyAjjmdWbOmBAkWXbjpMVVEVkot9WwFw7VI`);
    coordenadas = JSON.parse(data);
    
    console.log(coordenadas.results[0].geometry.location);

    var latitude = document.getElementById('latitude-acao');
    var longitude = document.getElementById('longitude-acao');

    latitude.value = coordenadas.results[0].geometry.location.lat
    longitude.value = coordenadas.results[0].geometry.location.lng
    

}
