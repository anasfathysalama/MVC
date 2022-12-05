<?php

namespace anas\core;

class Request
{


    /**
     * @var array
     */
    private array $body;


    public function __construct()
    {
        $this->body = [];
    }


    /**
     * @return string
     */
    public function getPath(): string
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if ($position === false) {
            return $path;
        }
        return substr($path, 0, $position);
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    /**
     * @return array
     */
    public function all(): array
    {
        if ($this->getMethod() === "get") {
            foreach ($_GET as $key => $value) {
                $this->body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->getMethod() === "post") {
            foreach ($_POST as $key => $value) {
                $this->body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $this->body;
    }


    /**
     * @param $key
     * @param string $default
     * @return string
     */
    public function get($key, string $default = ''): string
    {
        $this->all();
        return $this->body[$key] !== '' ? $this->body[$key] : $default;
    }

    /**
     * @param $key
     * @return bool
     */
    public function filled($key): bool
    {
        $this->all();
        return isset($this->body[$key]) && $this->body[$key] !== '';
    }

}