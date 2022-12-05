<?php

namespace anas\app\controllers;

use anas\core\Request;
use anas\core\View;

class LoginController
{
    public function index()
    {
        echo View::make('auth/login');
    }


    public function store(Request $request)
    {
        dump($request->all());
        echo "handling from controller";
    }
}