<?php
namespace App\Core;

class Router
{
    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file)
    {
        $router = new static;
        require $file;
        return $router;
    }

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $requestMethod)
    {
        if (array_key_exists($uri, $this->routes[$requestMethod])) {
            return $this->callAction(
                ...explode('@', $this->routes[$requestMethod][$uri])
            );
        }
        throw new \Error('route dies not exists');
    }

    public function callAction($controller, $method)
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;
        if (method_exists($controller, $method)) {
            return $controller->$method();
        }
        throw new \Error('method not exists');
    }
}
