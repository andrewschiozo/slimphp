<?php

use Slim\Factory\AppFactory;
use Illuminate\Database\Capsule\Manager as Capsule;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

$app->setBasePath('/agenda_reuniao');


//Eloquent
$capsule = new Capsule;
$capsule->addConnection(['driver' => 'sqlite', 'database' => __DIR__ . '/database.sqlite']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

//Rotas
require __DIR__ . '/src/routes.php';

//Middleware
$app->addErrorMiddleware(true, true, true);

$app->run();