<?php

namespace App\Database;

use http\Exception;
use http\Message;
use PDO;
use App\Config;

class Database 
{
    private static $pdo = null;
    private static $options;

    public static function getPDO()
    {
        if(is_null(self::$pdo)) {

            self::$options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            ];

            try {
                self::$pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/dbname') . ';charset=utf8', Config::get('mysql/user'), Config::get('mysql/pass'), self::$options);
            } catch (\PDOException $e) {
                die("La connexion à la base de données n'a pas pu être établie!");
            }
        }

        return self::$pdo;
        
    }
    
}