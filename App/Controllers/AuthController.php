<?php


namespace App\Controllers;


class AuthController extends Controller
{
    public function index()
    {
        $pageTitle = "Loginpage";

        $this->render('login', compact('pageTitle'));
    }
}