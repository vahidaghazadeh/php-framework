<?php
namespace app\core\Controllers;
use app\core\base\App;
use app\core\base\Controller;
use app\core\base\Request;

class AppController extends Controller {

    public function home(){


        $params = array('name' => 'PHP MVC', 'version' => '0.0.1');
        return $this->view('home', $params);
    }

    public function contact(){
        return $this->view('contact');
    }

    public function contactAction(Request $request){
        echo '<pre>';
        var_dump($request->getParams());
        echo '</pre>';
        exit();
//        return $this->response();
    }
}