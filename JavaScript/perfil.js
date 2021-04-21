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
ativarModal.addEventListener('click', () => iniciaModal('modall-cadastro'))

function iniciaModall(modallID) {
    const modal = document.getElementById(modallID)
    if (modal) {
        modal.classList.add('mostrarr')
        modal.addEventListener('click', (e) => {
            if (e.target.id == modallID || e.target.className == 'close') {
                modal.classList.remove('mostrarr')
            }
        })
    }
}

const ativarModall = document.querySelector('.ativarModall')
ativarModall.addEventListener('click', () => iniciaModall('modall-editarImagem'))

function previewImagem() {
    var imagem = document.querySelector('input[name=imageee]').files[0]
    var preview = document.querySelector('img[name=imagee]')

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