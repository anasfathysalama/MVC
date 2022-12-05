<?php

namespace anas\core;

use anas\app\Exceptions\NotFoundRouteException;

class Router
{

    /**
     * @var array application routes
     */
    protected array $routes = [];
    protected Request $request;
    protected Response $response;


    public function __construct()
    {
        $this->request = new Request();
        $this->response = new Response();
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

    /**
     * @param $path
     * @param $action
     * @return void
     */
    public function post($path, $action): void
    {
        $this->routes['post'][$path] = $action;
    }

    public function resolve()
    {

        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $action = $this->routes[$method][$path] ?? false;

        if ($action === false) {
            $this->response->setStatusCode(404);
            throw new NotFoundRouteException('Route Not Found');
        }

        if ($action instanceof \Closure) {
            return $action();
        }

        if (is_array($action)) {
            [$class, $method] = $action;
            if (class_exists($class)) {
                if (method_exists($class, $method)) {
                    call_user_func([new $class, $method], $this->request);
                } else {
                    echo "$method not exists inside class $class";
                    exit();
                }
            } else {
                echo "$class not found";
                exit();
            }
        }
    }


}