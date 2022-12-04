<?php

namespace anas\core;

class Application
{

    public Router $route;
    public static string $APP_PATH;

    public function __construct($applicationPath)
    {
        $this->route = new Router();
        self::$APP_PATH = $applicationPath;
    }

    /**
     * @return void
     * @throws Exceptions\NotFoundRouteException
     */
    public function run(): void
    {
        $this->route->resolve();
    }

}