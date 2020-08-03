<?php

use App\Request;
use App\Router\Router;

class App {

    private  static $request;
    private static $url;

    static $controller;
    static $method;
    static $args = [];

    public static function init() {
        require_once "./App/init.php";

        self::$request = new Request($_SERVER['REQUEST_URI']);
        self::$url = Router::parse(self::$request->url);

    }

    public static function process() {

        self::$controller = self::$request->controller;
        self::$method = self::$request->method;
        self::$args = self::$request->params;

        if(isset(self::$url[0])) {
            if(class_exists('App\Controllers\\' . self::$url[0] . 'Controller')) {
                self::$controller = ucfirst(self::$url[0]) . 'Controller';
                unset(self::$url[0]);
            }
        }

        self::$controller = 'App\Controllers\\' . self::$controller;

        if(isset(self::$url[1])) {
            if(method_exists(self::$controller, self::$url[1])) {
                self::$method =  self::$url[1];
                unset(self::$url[1]);
            }
        }

        self::$args = array_slice(self::$url, 0);

        call_user_func_array([new self::$controller, self::$method], self::$args);

    }

    public static function timeago($datetime, $locale = 'en') {
        $time = time() - strtotime($datetime);

        $units = [
            "en" => [
                31536000 => 'year',
                2592000 => 'month',
                604800 => 'week',
                86400 => 'day',
                3600 => 'hour',
                60 => 'minute',
                1 => 'second'
            ],
            "fr" => [
                2592000 => 'mois',
                604800 => 'semaine',
                86400 => 'jour',
                3600 => 'heure',
                60 => 'minute',
                1 => 'seconde'
            ],
            "pt" => [
                31536000 => 'ano',
                2592000 => 'mês',
                604800 => 'semana',
                86400 => 'dia',
                3600 => 'hora',
                60 => 'minuto',
                1 => 'segundo'
            ]
        ];

        foreach ($units[$locale] as $unit => $val) {
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);

            if($locale == "en") {
                return ($val == 'second')? 'a few seconds ago' : (($numberOfUnits>1) ? $numberOfUnits : (($val == 'hour') ? 'an' : 'a')) .' '.$val.(($numberOfUnits>1) ? 's' : '').' ago';
            } elseif ($locale == "fr") {
                if($time > 5184000) {
                    setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
                    return utf8_encode(strftime("%e %B %G", strtotime($datetime)));
                } else {
                    return ($val == 'seconde')? 'à l\instant' : (($time > 2592000) ? "Il y a plus d'un mois" : "Il y a $numberOfUnits") .' '. (($val == 'mois') ? '' : $val) . (($val == 'mois') ? '' : (($numberOfUnits>1) ? 's' : ''));
                }
            } elseif($locale == "pt") {
                if($time > 5184000) {
                    setlocale(LC_TIME, ['pt', 'pt', 'pt_PT']);
                    return utf8_encode(strftime("%e %B %G", strtotime($datetime)));
                } else {
                    return ($val == 'second') ? 'Agora mesmo' : 'Há '. (($numberOfUnits>1) ? $numberOfUnits : (($val == 'hora') ? 'uma' : 'um')) .' '.$val.(($numberOfUnits>1) ? (($val == 'mês') ? 'es' : 's') : '');
                }
            }
        }
    }
}