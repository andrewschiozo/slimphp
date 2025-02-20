<?php

use src\Middleware\JsonBodyParserMiddleware;

$app->get('/', function ($request, $response, $args) {
    $response->getBody()->write(json_encode(['message' => 'Hello world!']));
    return $response;
});

$app->get('/agendamentos', [\src\Agendamento\Controllers\AgendamentoController::class, 'listar']);
$app->get('/agendamentos/proximos', [\src\Agendamento\Controllers\AgendamentoController::class, 'listarProximos']);
$app->get('/agendamento/{id}', [\src\Agendamento\Controllers\AgendamentoController::class, 'ver']);
$app->post('/agendamento', [\src\Agendamento\Controllers\AgendamentoController::class, 'salvar'])->add(new JsonBodyParserMiddleware());