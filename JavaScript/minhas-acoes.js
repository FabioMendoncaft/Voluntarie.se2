function endereco() {
    var cep = document.getElementById('cep')
    var url = "https://viacep.com.br/ws/" + cep.value + "/json/"
    var logradouro = document.getElementById('logradouro')
    var bairro = document.getElementById('bairro')
    var localidade = document.getElementById('localidade')
    var uf = document.getElementById('uf')

    fetch(url, { method: 'GET' })
        .then(response => {
            response.json()
                .then(data => {
                    logradouro.value = data.logradouro
                    bairro.value = data.bairro
                    localidade.value = data.localidade
                    uf.value = data.uf
                })
        })
        .catch(erro => {
            logradouro.value = ""
            bairro.value = ""
            localidade.value = ""
            uf.value = ""
            alert("CEP não encontrado!")
        })
}

function previewImagem() {
    var imagem = document.querySelector('input[name=imagem]').files[0]
    var preview = document.querySelector('img[name=imagem]')
    var reader = new FileReader();

    reader.onloadend = function() {
        preview.src = reader.result
    }

    if (imagem) {
        reader.readAsDataURL(imagem)
    } else {
        preview.src = " "
    }
}

function iniciaModal(modalID) {
    const modal = document.getElementById(modalID)
    if (modal) {
        modal.classList.add('mostrar')
        modal.addEventListener('click', (e) => {
            if (e.target.id == modalID || e.target.className == 'close') {
                modal.classList.remove('mostrar')
            }
        })
    }
}

const ativarModal = document.querySelector('.ativarModal')
ativarModal.addEventListener('click', () => iniciaModal('modal-editar'))