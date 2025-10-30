<?php
function requireAuth()
{
    if (!isset($_SESSION['usuario'])) {
        header('Location: ' . BASE_URL . '/login');
        exit;
    }
}

function authMiddleware($controllerClass, $method)
{
    return function () use ($controllerClass, $method) {
        requireAuth();
        (new $controllerClass)->$method();
    };
}

function requireAuthBolsaTrabajo()
{
    if (!isset($_SESSION['usuario'])) {
        header('Location: ' . BASE_URL . '/bolsatrabajo/login');
        exit;
    }
}

function authMiddlewareBolsaTrabajo($controllerClass, $method)
{
    return function () use ($controllerClass, $method) {
        requireAuthBolsaTrabajo();
        (new $controllerClass)->$method();
    };
}