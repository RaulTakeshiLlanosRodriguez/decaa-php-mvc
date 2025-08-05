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
            $action = $routes[$uri];

            if (is_callable($action)) {
                // Si es un Closure, lo ejecuta directamente
                call_user_func($action);
            } elseif (is_array($action) && count($action) === 2) {
                [$controller, $method] = $action;
                $controllerInstance = new $controller();
                $controllerInstance->$method();
            } else {
                http_response_code(500);
                echo "500 - Acción inválida";
            }
        } else {
            http_response_code(404);
            echo "404 - Ruta no encontrada";
        }
    }


    private function getCurrentUri()
    {
        $scriptName = dirname($_SERVER['SCRIPT_NAME']);
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = '/' . trim(str_replace($scriptName, '', $uri), '/');
        return $this->normalize($uri);
    }


    private function normalize($uri)
    {
        return '/' . trim($uri, '/');
    }
}
