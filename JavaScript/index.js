function feedback(){
    document.querySelector('.feedback').style.display="none"
}    
    setTimeout("feedback()", 5000);

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
ativarModall.addEventListener('click', () => iniciaModall('modall-esqueci'))


