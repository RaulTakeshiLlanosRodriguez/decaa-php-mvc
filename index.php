<?php

require_once __DIR__ . '/config/session.php';
require_once __DIR__ . '/config/app.php';
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/core/Router.php';

// Autocarga de controladores y modelos si no usas Composer
spl_autoload_register(function ($class) {
    $classPath = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($classPath)) {
        require_once $classPath;
    }
});

// Inicia enrutador
$router = new Router;

// Cargar rutas
require_once __DIR__ . '/routes/web.php';

// Ejecutar
$router->run();
