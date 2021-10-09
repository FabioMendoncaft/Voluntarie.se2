$(document).ready(function () {
    $("#alterarSenha").validate({
        rules: {
            senhaAtual: {
                required: true
            },
            novaSenha: {
                required: true
            },
            confirmarSenha: {
                required: true,
                equalTo: "#novaSenha"
            }
        },
    })
})