$(document).ready(function () {

  // =========================================
  // MOSTRAR / OCULTAR SENHA
  // =========================================

  $("#mostrarSenha").on("change", function () {

      if ($(this).is(":checked")) {

          $("#senha").attr(
              "type",
              "text"
          );

      } else {

          $("#senha").attr(
              "type",
              "password"
          );

      }

  });


  // =========================================
  // VALIDAÇÃO DO FORMULÁRIO
  // =========================================

  $("#formLogin").validate({

      rules: {

          email: {
              required: true,
              email: true
          },

          senha: {
              required: true
          }

      },

      messages: {

          email: {
              required:
                  "Informe o e-mail.",

              email:
                  "Informe um e-mail válido."
          },

          senha: {
              required:
                  "Informe a senha."
          }

      },

      errorPlacement: function (
          error,
          element
      ) {

          if (
              element.closest(".input-group").length
          ) {

              error.insertAfter(
                  element.closest(".input-group")
              );

          } else {

              error.insertAfter(element);

          }

      }

  });


  // =========================================
  // ENVIO DO LOGIN
  // =========================================

  $("#formLogin").on(
      "submit",
      async function (event) {

          // Impede o envio padrão
          event.preventDefault();


          // =====================================
          // VERIFICA SE O FORMULÁRIO É VÁLIDO
          // =====================================

          if (!$("#formLogin").valid()) {

              return;

          }


          // =====================================
          // PEGA O FORMULÁRIO
          // =====================================

          const formulario = this;


          // =====================================
          // CRIA O FORMDATA
          // =====================================

          const dados =
              new FormData(formulario);


          // =====================================
          // MOSTRA NO CONSOLE
          // =====================================

          console.table(
              Object.fromEntries(
                  dados.entries()
              )
          );


          // =====================================
          // ÁREA DE MENSAGEM
          // =====================================

          const mensagem =
              document.getElementById(
                  "mensagem"
              );


          mensagem.className =
              "alert alert-info mt-3";


          mensagem.textContent =
              "Verificando login...";


          try {

              // =================================
              // ENVIA PARA O CONTROLLER
              // =================================

              const resposta =
                  await fetch(
                      "controllers/LoginController.php",
                      {
                          method: "POST",
                          body: dados
                      }
                  );


              // =================================
              // CONVERTE A RESPOSTA
              // =================================

              const resultado =
                  await resposta.json();


              console.log(
                  "Resposta do login:",
                  resultado
              );


              // =================================
              // LOGIN INCORRETO
              // =================================

              if (
                  !resposta.ok ||
                  !resultado.sucesso
              ) {

                  mensagem.className =
                      "alert alert-danger mt-3";


                  mensagem.textContent =
                      resultado.mensagem ??
                      "Não foi possível realizar o login.";


                  return;

              }


              // =================================
              // LOGIN REALIZADO
              // =================================

              mensagem.className =
                  "alert alert-success mt-3";


              mensagem.textContent =
                  resultado.mensagem;


              // =================================
              // SOMENTE AGORA REDIRECIONA
              // =================================

              setTimeout(
                  function () {

                      window.location.href =
                          "index.php?page=home";

                  },
                  800
              );


          } catch (erro) {

              mensagem.className =
                  "alert alert-danger mt-3";


              mensagem.textContent =
                  "Erro ao comunicar com o Controller.";


              console.error(
                  "Erro no login:",
                  erro
              );

          }

      }
  );

});