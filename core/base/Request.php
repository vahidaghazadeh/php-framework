<?php
namespace app\core\base;

class Request
{
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if (!$position)
            return $path;

        return substr($path, 0 , $position);
    }

    public function method()
    {

        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isGet()
    {
        return $this->method() === "get";
    }

    public function isPost()
    {
        return $this->method() === 'post';
    }

    public function getParams(){
        $params = [];
        if ($this->method() === "get"){
            foreach ($_GET as $key => $value){
                $params[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if ($this->method() === "post"){
            foreach ($_POST as $key => $value){
                $params[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $params;
    }

}