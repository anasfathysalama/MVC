<?php

namespace anas\app\controllers;

use anas\core\Request;
use anas\core\View;

class ContactController
{
    protected Request $request ;
    public function __construct()
    {
        $this->request = new Request();
    }

    public function index()
    {
        echo View::make('contact');
    }

    public function store(Request $request)
    {
        dump($request->all());
        echo "handling from controller";
    }
}