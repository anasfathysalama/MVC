<?php

namespace Core;

//require '../Exceptions/MethodNotFoundException.php';
//require '../Exceptions/ClassNotFoundException.php';
//require '../Exceptions/RouteNotFoundException.php';

class Router
{

    /**
     * contain all routes
     * @var array
     */
    private array $routes = [];


    /**
     * contain rout parameters
     * @var array
     */
    private array $params = [];


    /**
     * add new route to $routs array
     * @param string $route the url route
     * @param array $params contain [contrller , action]
     */
    public function add(string $route, array $params): void
    {
        $processedRoute = strpos($route, "/") === 0 ? $route : "/" . $route;
        $this->routes[$processedRoute] = $params;

    }


    /**
     * @param string $url
     * @return bool
     */
    public function match(string $url): bool
    {
        foreach ($this->routes as $route => $params) {
            if ($url === $route || strlen($url) === 0) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    /**
     * get all routes
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }


    /**
     * @param $url
     * @return void
     */
    public function dispatch($url): void
    {
        $url = $this->removeUrlQueryStringVariables($url);
        if ($this->match($url)) {
            [$controller, $action] = $this->extractClassAndMethod($url);
            $className = "App\Controllers\\" . $this->handelClassName($controller);
            if (class_exists($className)) {
                $classObject = new $className();
                if (method_exists($classObject, $action)) {
                    call_user_func_array([$classObject, $action], []);
                } else {
//                    throw new MethodNotFoundException();
                    echo "method {$action} not found in class {$className}";
                }
            } else {
                echo "class {$className} not found";
//                throw new ClassNotFoundException();
            }
        } else {
            echo "404 not found";
//            throw new RouteNotFoundException();
        }
    }

    /**
     * @param $controller
     * @return array|string|string[]
     */
    private function handelClassName($controller)
    {
        return str_replace(' ', '', ucwords($controller));
    }

    /**
     * @param $url
     * @return array
     */
    private function extractClassAndMethod($url): array
    {
        if (strlen($url) === 0) {
            $url = "/";
        }
        return [
            $this->routes[$url]['controller'] ?? $this->routes[$url][0],
            $this->routes[$url]['action'] ?? $this->routes[$url][1]
        ];
    }

    /**
     * @param $url
     * @return mixed|string|void
     */
    protected function removeUrlQueryStringVariables($url)
    {
        if ($url !== '') {
            $parts = explode("&", $url);
            $url = '';
            if (strpos($parts[0], '=') === false) {
                $url = $parts[0];
            }
            return $url;
        }
    }

}