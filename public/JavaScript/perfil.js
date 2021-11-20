function previewImagem() {
    var imagem = document.querySelector('input[name=imagem_perfil]').files[0]
    var preview = document.querySelector('img[name=imagemPerfil]')

    var reader = new FileReader()

    reader.onloadend = function() {
        preview.src = reader.result
    }

    if (imagem) {
        reader.readAsDataURL(imagem)
    } else {
        preview.src = " "
    }
}

$(document).ready(function () {
    $("#telefone").mask("(00)00000-0000")
})

$(document).ready(function () {
    $("#alterar").validate({
        rules: {
            nome: {
                required: true,
                maxlength: 20,
                minlength: 7,
                maxWords: 3
            },
            senhaAtual: {
                rangelength: [6, 10]
            },
            novaSenha: {
                rangelength: [6, 10]
            },
            confirmar: {
                equalTo: "#novaSenha"
            },
            sexo: {
                required: true,
            }
        },
    })
})

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
