<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use src\Controllers\AgendaController;

// $app->get('/json', function (Request $request, Response $response, $args) {
//     $json = json_encode(['hello' => 'world']);
    
    
//     $response->getBody()->write($json);
//     return $response->withHeader('Content-Type', 'application/json');
// });


$app->get('/', function (Request $request, Response $response) use ($renderer) {
    return $response->withHeader('Location', '/agendamentos')->withStatus(302);
});

$app->get('/agendamentos', function (Request $request, Response $response) use ($renderer) {
    $controller = new AgendaController($renderer);
    return $controller->listar($request, $response);
});

$app->get('/agendamentos/proximos', function (Request $request, Response $response) use ($renderer) {
    $controller = new AgendaController($renderer);
    return $controller->listarProximas($request, $response);
});

$app->get('/agendamento/{id}', function (Request $request, Response $response, $id) use ($renderer) {
    $controller = new AgendaController($renderer);
    return $controller->ver($request, $response, $id);
});

$app->post('/agendamento', function (Request $request, Response $response) use ($renderer) {
    $controller = new AgendaController($renderer);
    return $controller->salvar($request, $response);
});