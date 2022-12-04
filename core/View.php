<?php

namespace anas\core;

class View
{
    public static function make($view)
    {
        $layoutContent = self::layoutContent();
        $viewContent = self::viewContent($view);
        echo str_replace("{{ content }}", $viewContent, $layoutContent);
    }

    private static function layoutContent()
    {
        ob_start();
        include_once Application::$APP_PATH . "/views/layouts/main.php";
        return ob_get_clean();
    }

    private static function viewContent($view)
    {
        ob_start();
        include_once Application::$APP_PATH . "/views/{$view}.php";
        return ob_get_clean();
    }
}