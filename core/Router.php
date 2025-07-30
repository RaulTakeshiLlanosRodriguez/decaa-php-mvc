<?php

class Router
{
    private $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function get($uri, $action)
    {
        $this->routes['GET'][$this->normalize($uri)] = $action;
    }

    public function post($uri, $action)
    {
        $this->routes['POST'][$this->normalize($uri)] = $action;
    }

    public function run()
    {
        $uri = $this->getCurrentUri();
        $method = $_SERVER['REQUEST_METHOD'];

        $routes = $this->routes[$method] ?? [];

        if (array_key_exists($uri, $routes)) {
            [$controller, $method] = $routes[$uri];
            $controllerInstance = new $controller();
            $controllerInstance->$method();
        } else {
            http_response_code(404);
            echo "404 - Ruta no encontrada";
        }
    }

    private function getCurrentUri()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $scriptName = dirname($_SERVER['SCRIPT_NAME']);
        return $this->normalize(str_replace($scriptName, '', $uri));
    }

    private function normalize($uri)
    {
        return '/' . trim($uri, '/');
    }
}
