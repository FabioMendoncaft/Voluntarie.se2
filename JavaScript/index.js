$(document).ready(function () {
    $("#telefone").mask("(00)00000-0000")
})

$(document).ready(function () {
    $("#esqueciSenha").validate({
        rules: {
            email: {
                required: true,
                email: true
            }
        }
    })
})

$(document).ready(function () {
    $("#cadastro").validate({
        rules: {
            nome: {
                required: true,
                maxlength: 100,
                minlength: 10,
                minWords: 2
            },
            email: {
                required: true,
                email: true
            },
            senha: {
                required: true,
                rangelength: [6, 10]
            },
            confirmar: {
                required: true,
                equalTo: "#senha"
            },
            sexo: {
                required: true,
            }
        },
    })
})
