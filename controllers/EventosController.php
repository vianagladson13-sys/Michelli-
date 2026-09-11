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
    // NOME DO EVENTO
    // =====================================================

    $validator->required(
        "nomeEvento",
        "O nome do evento é obrigatório."
    );

    $validator->string(
        "nomeEvento",
        "O nome do evento deve ser um texto válido."
    );

    $validator->minLength(
        "nomeEvento",
        3,
        "O nome do evento deve conter no mínimo 3 caracteres."
    );

    $validator->maxLength(
        "nomeEvento",
        100,
        "O nome do evento deve conter no máximo 100 caracteres."
    );


    // =====================================================
    // CATEGORIA
    // =====================================================

    $validator->required(
        "categoria",
        "A categoria é obrigatória."
    );

    $validator->string(
        "categoria",
        "A categoria deve ser um texto válido."
    );


    // =====================================================
    // DATA DO EVENTO
    // =====================================================

    $validator->required(
        "dataEvento",
        "A data do evento é obrigatória."
    );

    $validator->string(
        "dataEvento",
        "A data do evento deve ser válida."
    );


    // =====================================================
    // HORÁRIO
    // =====================================================

    $validator->required(
        "horaEvento",
        "O horário do evento é obrigatório."
    );

    $validator->string(
        "horaEvento",
        "O horário do evento deve ser válido."
    );


    // =====================================================
    // LOCAL
    // =====================================================

    $validator->required(
        "localEvento",
        "O local do evento é obrigatório."
    );

    $validator->string(
        "localEvento",
        "O local do evento deve ser um texto válido."
    );

    $validator->minLength(
        "localEvento",
        3,
        "O local do evento deve conter no mínimo 3 caracteres."
    );

    $validator->maxLength(
        "localEvento",
        150,
        "O local do evento deve conter no máximo 150 caracteres."
    );


    // =====================================================
    // DESCRIÇÃO
    // =====================================================

    $validator->required(
        "descricaoEvento",
        "A descrição do evento é obrigatória."
    );

    $validator->string(
        "descricaoEvento",
        "A descrição deve ser um texto válido."
    );

    $validator->minLength(
        "descricaoEvento",
        10,
        "A descrição deve conter no mínimo 10 caracteres."
    );

    $validator->maxLength(
        "descricaoEvento",
        500,
        "A descrição deve conter no máximo 500 caracteres."
    );


    // =====================================================
    // ORGANIZADOR
    // =====================================================

    $validator->required(
        "organizador",
        "O nome do organizador é obrigatório."
    );

    $validator->string(
        "organizador",
        "O nome do organizador deve ser um texto válido."
    );

    $validator->minLength(
        "organizador",
        3,
        "O nome do organizador deve conter no mínimo 3 caracteres."
    );

    $validator->maxLength(
        "organizador",
        100,
        "O nome do organizador deve conter no máximo 100 caracteres."
    );


    // =====================================================
    // CONTATO
    // =====================================================

    $validator->required(
        "contato",
        "O contato do organizador é obrigatório."
    );

    $validator->string(
        "contato",
        "O contato deve ser um texto válido."
    );

    $validator->minLength(
        "contato",
        10,
        "O contato deve conter no mínimo 10 caracteres."
    );

    $validator->maxLength(
        "contato",
        15,
        "O contato deve conter no máximo 15 caracteres."
    );

}
