<?php

// A resposta será enviada em formato JSON
header("Content-Type: application/json; charset=utf-8");


// Carrega a classe Validator
require __DIR__ . "/../libs/php/Validator.php";


// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    http_response_code(405);

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Método não permitido. Utilize uma requisição POST.",
        "dados" => null,
        "erros" => null
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    exit;
}


// Cria o objeto validador
$validator = new Validator($_POST);


// Executa as regras de validação
validarCadastro($validator);


// Verifica se existem erros de validação
if ($validator->fails()) {

    http_response_code(422);

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Corrija os campos indicados.",
        "dados" => null,
        "erros" => $validator->errors()
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    exit;
}


// -------->>> TODO: Aqui será realizado o cadastro no banco de dados


// Retorna sucesso
http_response_code(200);

echo json_encode([
    "sucesso" => true,
    "mensagem" => "Evento cadastrado com sucesso (controllerEvento).",
    "dados" => $validator->data(),
    "erros" => null
], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

exit;


// =========================================================
// FUNÇÃO DE VALIDAÇÃO
// =========================================================

function validarCadastro($validator)
{

    // =====================================================
    // NOME USUARIO
    // =====================================================

    $validator->required(
        "nomeUsuario",
        "O nome do Usuario é obrigatório."
    );

    $validator->string(
        "nomeUsuario",
        "O nome do Usuario deve ser um texto válido."
    );

    $validator->minLength(
        "nomeUsuario",
        3,
        "O nome do Usuario deve conter no mínimo 3 caracteres."
    );

    $validator->maxLength(
        "nomeUsuario",
        100,
        "O nome do Usuario deve conter no máximo 100 caracteres."
    );


    // =====================================================
    // CPF
    // =====================================================

    $validator->required(
        "CPF",
        "A CPF é obrigatório."
    );

    $validator->string(
        "CPF",
        "O CPF deve ser um texto válido."
    );


    // =====================================================
    // E-mail
    // =====================================================

    $validator->required(
        "E-mail",
        "O E-mail é obrigatório."
    );

    $validator->string(
        "E-mail",
        "O E-mail deve ser válido."
    );


    // =====================================================
    // Telefone
    // =====================================================

    $validator->required(
        "Telefone",
        "O Telefone  é obrigatório."
    );

    $validator->string(
        "Telefone",
        "O Telefone deve ser um texto válido."
    );

    $validator->minLength(
        "Telefone",
        10,
        "O Telefone deve conter no mínimo 10 caracteres."
    );

    $validator->maxLength(
        "Telefone",
        15,
        "O Telefone deve conter no máximo 15 caracteres."
    );

}
