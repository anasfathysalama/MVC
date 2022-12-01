<?php
require __DIR__ .'/../vendor/autoload.php';


use anas\core\Application;



$app = new Application();

$app->route->get('/' , function (){
    echo 'Home';
});
$app->route->get('/users' , function (){
    echo 'users';
});
$app->route->get('/contact' , function (){
    echo 'contact';
});

$app->run();
