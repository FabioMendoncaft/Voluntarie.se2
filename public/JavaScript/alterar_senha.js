$(document).ready(function () {
    $("#alterarSenha").validate({
        rules: {
            senhaAtual: {
                required: true,
                rangelength: [6, 20]
            },
            novaSenha: {
                required: true,
                rangelength: [6, 20]
            },
            confirmarSenha: {
                required: true,
                equalTo: "#novaSenha",
            }
        },
    })
})