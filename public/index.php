<?php
/*
 * require composer autoload
 */
require_once __DIR__.'/../vendor/autoload.php';
use app\core\base\App;
/*
 * require base app class for use current dir
 */
$app = new App(dirname(__DIR__));

/*
 * require web routers
 */
include_once __DIR__.'/../routers/web_route.php';
$app->run();




