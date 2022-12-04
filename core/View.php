<?php

namespace anas\core;

use anas\Factories\ViewFactory;

class View
{
    /**
     * @param $view
     * @param $params
     * @return array|false|string|string[]
     */
    public static function make($view, $params = [])
    {
        $layoutContent = self::layoutContent();
        $viewContent = self::viewContent($view, $params);
        return str_replace("{{ content }}", $viewContent, $layoutContent);
    }

    private static function layoutContent()
    {
        ob_start();
        include_once Application::$APP_PATH . "/views/layouts/main.php";
        return ob_get_clean();
    }

    private static function viewContent($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$APP_PATH . "/views/{$view}.php";
        return ob_get_clean();
    }
}