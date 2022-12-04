<?php

namespace anas\controllers;

use anas\core\View;

class LoginController
{
    public function index()
    {
        echo View::make('auth/login');
    }
}