<?php

namespace anas\app\controllers;

use anas\core\View;

class HomeController
{
    public function index()
    {
        $data = [
            'name' => 'Anas',
            'title' => 'Dev',
        ];
        echo View::make('home' , $data);
    }

}