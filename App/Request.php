<?php

namespace App;

class Request {
    
    public $url;
    public $controller = "Controller";
    public $method = "index";
    public $params = [];

    public function __construct($url)
    {
        $this->url = $url;
    }

    public static function getServer() {

        $server = NULL;

        if(isset($_SERVER['SERVER_ADDR'])) {
            $server = $_SERVER['SERVER_ADDR'] . ':' . $port = $_SERVER['SERVER_PORT'];
        } else if(isset($_SERVER['REMOTE_ADDR'])) {
            $server = $_SERVER['REMOTE_ADDR'] . ':' . $port = $_SERVER['SERVER_PORT'];
        }

        return $server;
    }

}