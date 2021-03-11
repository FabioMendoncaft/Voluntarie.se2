
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
