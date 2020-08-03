<?php

namespace App\Router;

use App\Request;

class Router {

    public static function parse($url) {

        if(isset($url)) {
            $url = trim($url, '/');
            $exploded_url = explode('/', $url);
    
            
            return array_slice($exploded_url, 0);
        }
        
    }
}