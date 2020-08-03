<?php

namespace App;

class Auth
{
    public function __construct()
    {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function isLogged()
    {
        if(isset($_SESSION['vms_auth'])) {
            return true;
        }
        return false;
    }
}