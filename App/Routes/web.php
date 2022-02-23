<?php

use App\Controllers\HomeController;
use Core\Router;

Router::get('/', [HomeController::class, 'index']);

