<?php

namespace anas\core;

use anas\core\Exceptions\NotFoundRouteException;

class Router
{

    /**
     * @var array application routes
     */
    protected array $routes = [];
    protected Request $request;


    public function __construct()
    {
        $this->request = new Request();
    }


    /**
     * @param $path
     * @param $action
     * @return void
     */
    public function get($path, $action): void
    {
        $this->routes['get'][$path] = $action;
    }

    public function resolve()
    {

        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $action = $this->routes[$method][$path] ?? false;

        if ($action === false) {
            throw new NotFoundRouteException('Route Not Found');
        }

        if ($action instanceof \Closure) {
            return $action();
        }

        if (is_string($action)) {
            return View::make($action);
        }
    }




}