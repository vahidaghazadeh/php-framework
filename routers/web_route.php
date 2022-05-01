<?php
namespace app\route;

use app\core\base\App;
use app\core\Controllers\AppController;

$app = new App(dirname(__DIR__));

$app->router->get('/', [AppController::class, 'home']);
$app->router->get('/notfound', 'notfound');
$app->router->get('/contact', [AppController::class, 'contact']);
$app->router->post('/contact', [AppController::class, 'contactAction']);

//$app->router->post('/contact', [AppController::class, 'contact']);

