<?php
namespace App\Controllers;

use App\Models\Publicacion;
use Core\Paginator;

class PublicacionController{

    public function index(){
         $filtros = [
            'docente' => $_GET['docente'] ?? '',
            'titulo'  => $_GET['titulo'] ?? '',
            'anio'    => $_GET['anio'] ?? '',
            'carrera' => $_GET['carrera'] ?? '',
        ];

        $pagina = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $porPagina = 5;

        // Obtener datos
        $publicaciones = Publicacion::buscar($filtros, $pagina, $porPagina);
        $total = Publicacion::contar($filtros);
        $anios = Publicacion::obtenerAnios();
        $carreras = Publicacion::obtenerCarreras();

        // Paginador
        $paginador = new Paginator($total, $pagina, $porPagina, BASE_URL . '/publicaciones', $_GET);

        // Vista
        require_once __DIR__ . '/../Views/publicaciones.view.php';
    }

    public function store()
    {
        $data = $_POST;

        $publicacion = new Publicacion();
        $publicacion->titulo = $data['titulo'] ?? '';
        $publicacion->docente = $data['docente'] ?? '';
        $publicacion->anio = $data['anio'] ?? '';
        $publicacion->carrera = $data['carrera'] ?? '';
        $publicacion->enlace = $data['enlace'] ?? '';
        $publicacion->activo = 1;

        $publicacion->save();

        header('Location: ' . BASE_URL . '/admin/publicaciones');
        exit;
    }

    public function update()
    {
        $data = $_POST;

        if (!isset($data['id'])) {
            header('Location: ' . BASE_URL . '/admin/publicaciones');
            exit;
        }

        $publicacion = Publicacion::findById($data['id']);

        if (!$publicacion) {
            header('Location: ' . BASE_URL . '/admin/publicaciones');
            exit;
        }

        $publicacion->titulo = $data['titulo'] ?? $publicacion->titulo;
        $publicacion->docente = $data['docente'] ?? $publicacion->docente;
        $publicacion->anio = $data['anio'] ?? $publicacion->anio;
        $publicacion->carrera = $data['carrera'] ?? $publicacion->carrera;
        $publicacion->enlace = $data['enlace'] ?? $publicacion->enlace;

        $publicacion->save();

        header('Location: ' . BASE_URL . '/admin/publicaciones');
        exit;
    }

    public function destroy()
    {
        $id = $_POST['id'] ?? null;

        if (!$id) {
            header('Location: ' . BASE_URL . '/admin/publicaciones');
            exit;
        }

        Publicacion::destroy($id);

        header('Location: ' . BASE_URL . '/admin/publicaciones');
        exit;
    }
}