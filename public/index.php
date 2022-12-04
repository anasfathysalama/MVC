<?php
require __DIR__ . '/../vendor/autoload.php';


use anas\core\Application;
use anas\core\View;


$app = new Application(dirname(__DIR__));

$app->route->get('/', 'home');
$app->route->get('/users', function () {
    echo 'users';
});
$app->route->get('/contact', function () {
    echo 'contact';
});
$app->route->get('/about', 'about');

$app->run();
