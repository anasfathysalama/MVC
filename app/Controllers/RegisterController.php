<?php

namespace anas\app\controllers;

use anas\core\View;

class RegisterController
{
    public function index()
    {
        echo View::make('auth/register');
    }
}