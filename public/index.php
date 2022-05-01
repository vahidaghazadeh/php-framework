<?php
require_once __DIR__.'/../vendor/autoload.php';
ini_set('display_errors', 'On');
use app\core\base\App;
$app = new App(dirname(__DIR__));
include_once __DIR__.'/../routers/web_route.php';
$app->run();
//namespace vendor;
//require_once 'Vendor/DBConnection.php';
//require_once 'Vendor/Bootstrap.php';
//ini_set('display_errors', 'On');
//$instance = DBConnection::getInstance();
//$instance->create("INSERT INTO records (session_id) VALUES (?)", [Bootstrap::getSessionKey()]);
//echo json_encode($instance->select("SELECT * FROM records;"));





