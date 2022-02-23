<?php

namespace Core;

class Request
{
    /**
     * @return mixed
     */
    public function methodType()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function path()
    {
        $path = $_SERVER['REQUEST_URI'] ?? "/";
        return $this->removeUrlQueryStringVariables($path);
    }

    /**
     * @param $url
     * @return mixed|string|void
     */
    protected function removeUrlQueryStringVariables($url)
    {
        if (!strpos("?", $url)) {
            $parts = explode("?", $url);
            $url = '';
            if (strpos($parts[0], '=') === false) {
                $url = $parts[0];
            }
            return $url;
        }

    }
}