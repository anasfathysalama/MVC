<?php

namespace Core;

use App\Controllers\HomeController;

class Router
{

    /**
     * contain all routes
     * @var array
     */
    public static array $routes = [];
    public Request $request;
    public Response $response;

    /**
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @param $route
     * @param $action
     */
    public static function get($route, $action): void
    {
        $route = self::handelPath($route);
        self::$routes['get'][$route] = $action;
    }

    /**
     * @param $route
     * @param $action
     */
    public static function post($route, $action): void
    {
        $route = self::handelPath($route);
        self::$routes['post'][$route] = $action;
    }


    /**
     *    - dispatch the action of the url
     */
    public function dispatch(): void
    {
        $path = $this->request->path();
        $method = $this->request->methodType();
        $action = self::$routes[$method][$path] ?? false;

        if (!$action) {
            // 404 handling
        }

        // callback
        if ($action instanceof \Closure) {
            call_user_func_array($action, []);
        }

        // array
        if (is_array($action)) {
            if (class_exists($action[0])) {
                if (method_exists($action[0], $action[1])) {
                    call_user_func_array([new $action[0], $action[1]], []);
                } else {
                    echo "method {$action[1]} does not exist in {$action[0]}";
                }
            } else {
                echo "class {$action[0]} not found";
            }

        }
    }

    protected static function handelPath(string $route): string
    {
        return strpos($route, "/") === 0 ? $route : "/" . $route;
    }


}