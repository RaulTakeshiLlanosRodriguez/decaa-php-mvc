<?php

use App\Controllers\AuthController;
use App\Controllers\ComiteController;
use App\Controllers\HomeController;
use App\Controllers\IndicadorController;
use App\Controllers\PublicacionController;

$router->get('/decaa', [HomeController::class, 'decaa']);
$router->get('/oseil', [HomeController::class, 'oseil']);
$router->get('/ogc', [HomeController::class, 'ogc']);
$router->get('/olic', [HomeController::class, 'olic']);
$router->get('/oaac', [HomeController::class, 'oaac']);
$router->get('/innovaciones', [HomeController::class, 'innovaciones']);
$router->get('/acreditacion', [HomeController::class, 'acreditacion']);

$router->get('/login', [AuthController::class, 'showLoginForm']);
$router->post('/login', [AuthController::class, 'login']);
$router->get('/logout', [AuthController::class, 'logout']);

$router->get('/', [IndicadorController::class, 'index']);
$router->get('/comites', [ComiteController::class, 'index']);
$router->get('/publicaciones', [PublicacionController::class, 'index']);
$router->post('/admin/publicaciones', [PublicacionController::class, 'store']);
$router->post('/admin/publicaciones/update', [PublicacionController::class, 'update']);
$router->post('/admin/publicaciones/delete', [PublicacionController::class, 'destroy']);
