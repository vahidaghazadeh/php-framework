<?php
namespace app\core\base;
class Response{
    public function setStatusCode($code)
    {
        http_response_code($code);
    }

    /**
     * @param $data
     * @return false|string
     */
    public function json($data){
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}