<?php

require __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . '/../App/Routes/web.php';

$route = new \Core\Router(new \Core\Request() , new \Core\Response());
$route->dispatch();

//use Core\Router;
//
//
//$router = new Router;
////$router->add('', ['Home', 'index']);
////$router->add('all-posts', ['Home', 'getAllPosts']);
//$router->add('posts/{id}/all', ['controller' => 'PostController', 'action' => 'index']);
////$router->add('/posts/create', ['controller' => 'PostController', 'action' => 'create']);
////$router->add('posts/show', ['controller' => 'Post controller', 'action' => 'show']);
//
//
//$url = $_SERVER['QUERY_STRING'];
//echo "<pre>";
//print_r($_SERVER);
//echo "</pre>";
//
//$router->dispatch($url);
