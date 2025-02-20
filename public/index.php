<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Factory\AppFactory;
// use Slim\Views\PhpRenderer;
use Illuminate\Database\Capsule\Manager as Capsule;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

//PhpRenderer
// $renderer = new PhpRenderer(__DIR__ . '/../src/views');

//Middleware
$app->add(function (Request $request, RequestHandler $handler) {
    return $handler->handle($request);
});

//Eloquent
$capsule = new Capsule;
$capsule->addConnection(['driver' => 'sqlite', 'database' => __DIR__ . '/../database.sqlite']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

//Rotas
require __DIR__ . '/../src/routes.php';

//Middleware
$app->addErrorMiddleware(true, true, true);

$app->run();