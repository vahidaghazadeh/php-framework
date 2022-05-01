<?php
namespace app\core\base;

class Controller extends Response
{
//    public App $app;
//    public function __construct()
//    {
//        $this->app = App::$app;
//    }

    public function view($view, $params = null){
        return App::$app->router->renderView($view, $params);
    }

    public function response($params){
        return App::$app->response->json($params);
    }
}