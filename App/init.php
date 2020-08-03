<?php

define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

$GLOBALS['config'] = [
    "mysql" => [
        "host" => "localhost",
        "user" => "root",
        "pass" => "",
        "dbname" => "vms"
    ]
];

spl_autoload_register(function($className) {

    $class = str_replace('\\', '/', $className);

    $file = ROOT . "$className.php";

    if(file_exists($file)) {
        require_once $file;
    }
});

function debug($var) {
    echo "<div style='width: 100%;max-width: 800px;margin: 0 auto;'><pre>" . print_r($var, true) . "</pre></div>";
}
