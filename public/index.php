<?php

//require '../Core/Router.php';
//require '../App/Controllers/Home.php';
//require '../App/Controllers/PostController.php';

/**
 * Autoloader
 */
spl_autoload_register(function ($class) {
    $root = dirname(__DIR__); // get the parent directory
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $file;
    }
});

$router = new Core\Router;
$router->add('', ['Home', 'index']);
$router->add('all-posts', ['Home', 'getAllPosts']);
$router->add('posts', ['controller' => 'Post Controller', 'action' => 'index']);
$router->add('/posts/create', ['controller' => 'PostController', 'action' => 'create']);
$router->add('posts/show', ['controller' => 'Post controller', 'action' => 'show']);


$url = $_SERVER['QUERY_STRING'];

 $router->dispatch($url);
