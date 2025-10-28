<?php

use App\Controllers\AdminController;
use App\Controllers\ArchivoController;
use App\Controllers\AuthController;
use App\Controllers\ComiteController;
use App\Controllers\ConvocatoriaController;
use App\Controllers\HomeController;
use App\Controllers\IndicadorController;
use App\Controllers\MiembroController;
use App\Controllers\PublicacionController;

$router->get('/nosotros', [HomeController::class, 'decaa']);
$router->get('/oseil', [HomeController::class, 'oseil']);
$router->get('/ogc', [HomeController::class, 'ogc']);
$router->get('/olic', [HomeController::class, 'olic']);
$router->get('/oaac', [HomeController::class, 'oaac']);
$router->get('/acreditacion', [HomeController::class, 'acreditacion']);
$router->get('/bolsatrabajo/mision', [HomeController::class, 'bolsatrabajomision']);
$router->get('/bolsatrabajo', [HomeController::class, 'bolsatrabajo']);
$router->get('/bolsatrabajo/postulacion-estudiante', [HomeController::class, 'postulacionestudiante']);
$router->get('/bolsatrabajo/login', [AuthController::class, 'showLoginFormBolsaTrabajo']);
$router->post('/bolsatrabajo/login', [AuthController::class, 'bolsatrabajoLogin']);
$router->get('/bolsatrabajo/empresas', authMiddlewareBolsaTrabajo(ConvocatoriaController::class, 'showConvocatoriaEmpresaForm'));
$router->get('/bolsatrabajo/registro', [AuthController::class, 'showRegistroFormBolsaTrabajo']);
$router->post('/bolsatrabajo/registro', [AuthController::class, 'registro']);
$router->get('/bolsatrabajo/logout', [AuthController::class, 'logoutBolsaTrabajo']);
$router->post('/bolsatrabajo/postular', [ConvocatoriaController::class, 'postular']);




$router->get('/login', [AuthController::class, 'showLoginForm']);
$router->post('/login', [AuthController::class, 'login']);
$router->get('/logout', [AuthController::class, 'logout']);

$router->get('/', [IndicadorController::class, 'index']);
$router->get('/comites', [ComiteController::class, 'index']);
$router->get('/publicaciones', [PublicacionController::class, 'index']);
$router->get('/innovaciones', [ArchivoController::class, 'index']);

$router->get('/admin', function () {
    requireAuth();
    header('Location:' .BASE_URL. '/admin/publicaciones');
    exit;
}
);
$router->get('/admin/publicaciones', authMiddleware(AdminController::class, 'publications'));
$router->get('/admin/indicadores', authMiddleware(AdminController::class, 'indicators'));
$router->get('/admin/comites', authMiddleware(AdminController::class, 'comites'));
$router->get('/admin/innovaciones', authMiddleware(AdminController::class, 'innovaciones'));
$router->get('/admin/miembros', authMiddleware(MiembroController::class, 'index'));

$router->post('/admin/publicaciones', authMiddleware(PublicacionController::class, 'store'));
$router->post('/admin/publicaciones/update', authMiddleware(PublicacionController::class, 'update'));
$router->post('/admin/publicaciones/delete', authMiddleware(PublicacionController::class, 'destroy'));

$router->post('/admin/indicadores', authMiddleware(IndicadorController::class, 'store'));
$router->post('/admin/indicadores/update', authMiddleware(IndicadorController::class, 'update'));
$router->post('/admin/indicadores/delete', authMiddleware(IndicadorController::class, 'destroy'));

$router->post('/admin/comites', authMiddleware(ComiteController::class, 'store'));
$router->post('/admin/comites/update', authMiddleware(ComiteController::class, 'update'));
$router->post('/admin/comites/delete', authMiddleware(ComiteController::class, 'destroy'));

$router->post('/admin/miembros', authMiddleware(MiembroController::class, 'store'));
$router->post('/admin/miembros/update', authMiddleware(MiembroController::class, 'update'));
$router->post('/admin/miembros/delete', authMiddleware(MiembroController::class, 'destroy'));

$router->post('/admin/innovaciones', authMiddleware(ArchivoController::class, 'store'));
$router->post('/admin/innovaciones/update', authMiddleware(ArchivoController::class, 'update'));
$router->post('/admin/innovaciones/delete', authMiddleware(ArchivoController::class, 'destroy'));