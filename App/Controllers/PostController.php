<?php

namespace App\Controllers;

class PostController
{
    public function index(): void
    {
        echo "from index method for post controller";
    }

    public function show()
    {
        echo "from show method for post controller";
    }
}