$(document).ready(function () {


    /* =====================================================
       MÁSCARA DE TELEFONE
    ====================================================== */

    $("#contato").mask("(00) 00000-0000");


    /* =====================================================
       DATA MÍNIMA = HOJE
    ====================================================== */

    const hoje = new Date();

    const ano = hoje.getFullYear();

    const mes = String(hoje.getMonth() + 1).padStart(2, "0");

    const dia = String(hoje.getDate()).padStart(2, "0");

    const dataAtual = `${ano}-${mes}-${dia}`;

    $("#dataEvento").attr("min", dataAtual);


    /* =====================================================
       VALIDAÇÃO
    ====================================================== */

    $("#formEvento").validate({

        rules: {

            nomeEvento: {

                required: true,

                minlength: 3,

                maxlength: 100

            },


            categoria: {

                required: true

            },


            dataEvento: {

                required: true,

                date: true

            },


            horaEvento: {

                required: true

            },


            localEvento: {

                required: true,

                minlength: 3,

                maxlength: 150

            },


            descricaoEvento: {

                required: true,

                minlength: 10,

                maxlength: 500

            },


            organizador: {

                required: true,

                minlength: 3,

                maxlength: 100

            },


            contato: {

                required: true,

                minlength: 15

            },


            imagemEvento: {

                extension: "jpg|jpeg|png|webp"

            }

        },


        messages: {

            nomeEvento: {

                required: "Informe o nome do evento.",

                minlength: "Digite pelo menos 3 caracteres.",

                maxlength: "O nome pode ter no máximo 100 caracteres."

            },


            categoria: {

                required: "Selecione uma categoria."

            },


            dataEvento: {

                required: "Informe a data do evento.",

                date: "Informe uma data válida."

            },


            horaEvento: {

                required: "Informe o horário do evento."

            },


            localEvento: {

                required: "Informe o local do evento.",

                minlength: "Informe um local válido.",

                maxlength: "O local pode ter no máximo 150 caracteres."

            },


            descricaoEvento: {

                required: "Informe uma descrição.",

                minlength: "A descrição deve possuir pelo menos 10 caracteres.",

                maxlength: "A descrição pode ter no máximo 500 caracteres."

            },


            organizador: {

                required: "Informe o nome do organizador.",

                minlength: "Digite pelo menos 3 caracteres.",

                maxlength: "O nome pode ter no máximo 100 caracteres."

            },


            contato: {

                required: "Informe o número de contato.",

                minlength: "Informe um telefone válido."

            },


            imagemEvento: {

                extension: "Envie uma imagem JPG, JPEG, PNG ou WEBP."

            }

        },


        errorElement: "label",

        errorClass: "error",


        highlight: function (element) {

            $(element)
                .addClass("error")
                .removeClass("valid");

        },


        unhighlight: function (element) {

            $(element)
                .removeClass("error")
                .addClass("valid");

        },


        submitHandler: function (form) {


            $("#mensagem")
                .removeClass("d-none alert-danger")
                .addClass("alert-success")
                .html(
                    '<i class="bi bi-check-circle me-2"></i>' +
                    'Formulário preenchido corretamente.'
                );


            /*
             * Aqui futuramente você poderá enviar
             * os dados para o PHP usando AJAX.
             */


            // form.submit();

        }

    });


    /* =====================================================
       CONTADOR DA DESCRIÇÃO
    ====================================================== */

    $("#descricaoEvento").on("input", function () {

        const limite = 500;

        const quantidade = $(this).val().length;

        $(".descricao-info").text(
            `${quantidade}/${limite} caracteres`
        );

    });


    /* =====================================================
       LIMPAR FORMULÁRIO
    ====================================================== */

    $("#formEvento").on("reset", function () {

        setTimeout(function () {

            $("#formEvento")
                .find(".error, .valid")
                .removeClass("error valid");

            $("#mensagem")
                .addClass("d-none")
                .removeClass("alert-success alert-danger");

            $(".descricao-info").text(
                "Máximo de 500 caracteres."
            );

        }, 10);

    });


});