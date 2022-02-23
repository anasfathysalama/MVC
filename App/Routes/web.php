<?php

require '../../Core/Router.php';

$router = new Router;
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('/posts', ['controller' => 'Post controller', 'action' => 'index']);
$router->add('/posts/create', ['controller' => 'Postcontroller', 'action' => 'create']);
