<?php

namespace anas\app\controllers;

use anas\app\Validation\Validation;
use anas\core\Request;
use anas\core\View;

class RegisterController
{
    public function index()
    {
        echo View::make('auth/register');
    }


    public function store(Request $request)
    {

        $validation = new Validation([
            'first_name' => ['required', 'between:3,6'],
        ]);


        $validation->validate([
            'first_name' => $request->get('first_name'),
        ]);

        if ($validation->pass()) {
            dump($request->all());
        } else {
            // validation errors
            dump($validation->errors());
        }

    }
}