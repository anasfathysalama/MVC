<?php

namespace anas\core;

class Application
{

    public Router $route;
    public Request $request;

    public function __construct()
    {
        $this->route = new Router();
        $this->request = new Request();
    }

    public function run()
    {
        $this->route->resolve();
    }

}