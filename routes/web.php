<?php

use anas\app\controllers\ContactController;
use anas\app\controllers\HomeController;
use anas\app\controllers\LoginController;
use anas\app\controllers\RegisterController;
use anas\core\Application;


$app = new Application(dirname(__DIR__));

$app->route->get('/', [HomeController::class, 'index']);
$app->route->get('/contact', [ContactController::class, 'index']);
$app->route->post('/contact', [ContactController::class, 'store']);
$app->route->get('/register', [RegisterController::class, 'index']);
$app->route->post('/register', [RegisterController::class, 'store']);
$app->route->get('/login', [LoginController::class, 'index']);
$app->route->post('/login', [LoginController::class, 'store']);

$app->run();
