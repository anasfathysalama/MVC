<?php

namespace anas\controllers;

use anas\core\View;

class RegisterController
{
    public function index()
    {
        echo View::make('auth/register');
    }
}