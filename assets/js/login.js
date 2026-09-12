$(document).ready(function () {


    /* =====================================================
       VALIDAÇÃO DO FORMULÁRIO
    ====================================================== */

    $("#formLogin").validate({

        rules: {

            email: {

                required: true,

                email: true

            },

            senha: {

                required: true,

                minlength: 6

            }

        },


        messages: {

            email: {

                required: "Digite seu e-mail.",

                email: "Digite um e-mail válido."

            },

            senha: {

                required: "Digite sua senha.",

                minlength: "A senha deve possuir pelo menos 6 caracteres."

            }

        },


        /* =================================================
           CONFIGURAÇÃO DA MENSAGEM DE ERRO
        ================================================== */

        errorElement: "label",

        errorClass: "error",


        /* =================================================
           POSICIONA O ERRO ABAIXO DO INPUT-GROUP
        ================================================== */

        errorPlacement: function (error, element) {

            if (element.closest(".input-group").length) {

                error.insertAfter(
                    element.closest(".input-group")
                );

            } else {

                error.insertAfter(element);

            }

        },


        /* =================================================
           CAMPO COM ERRO
        ================================================== */

        highlight: function (element) {

            $(element)
                .addClass("error")
                .removeClass("valid");

        },


        /* =================================================
           CAMPO VÁLIDO
        ================================================== */

        unhighlight: function (element) {

            $(element)
                .removeClass("error")
                .addClass("valid");

        },


        /* =================================================
           ENVIO DO FORMULÁRIO
        ================================================== */

        submitHandler: function (form) {

            /*
             * Aqui futuramente você poderá fazer
             * a requisição AJAX para o PHP.
             *
             * Por enquanto, o formulário será enviado
             * normalmente para:
             *
             * index.php?page=home
             */

            form.submit();

        }

    });


    /* =====================================================
       MOSTRAR / OCULTAR SENHA
    ====================================================== */

    $("#mostrarSenha").on("click", function () {


        const campoSenha = $("#senha");

        const icone = $(this).find("i");


        if (campoSenha.attr("type") === "password") {

            campoSenha.attr("type", "text");

            icone
                .removeClass("bi-eye")
                .addClass("bi-eye-slash");

        } else {

            campoSenha.attr("type", "password");

            icone
                .removeClass("bi-eye-slash")
                .addClass("bi-eye");

        }

    });


});