<?php

use anas\controllers\ContactController;
use anas\controllers\HomeController;
use anas\controllers\LoginController;
use anas\controllers\RegisterController;
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
