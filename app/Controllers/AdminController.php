<?php

namespace App\Controllers;

use App\Models\Comite;
use App\Models\Indicador;
use App\Models\Publicacion;
use Core\Paginator;

class AdminController
{

    public function dashboard()
    {
        require_once __DIR__ . '/../Views/admin/dashboard.php';
    }

    public function publications()
    {
        $filtros = []; // puedes aplicar filtros si deseas luego
        $pagina = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $porPagina = 5;

        $publicaciones = Publicacion::buscar($filtros, $pagina, $porPagina);
        $total = Publicacion::contar($filtros);

        // Reutilizas el mismo paginador que ya usaste en la parte pública
        $paginador = new Paginator($total, $pagina, $porPagina, BASE_URL . '/admin/publicaciones', $_GET);

        require_once __DIR__ . '/../Views/admin/publicaciones.view.php';
    }

    public function indicators()
    {
        $pagina = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $porPagina = 5;

        $indicadores = Indicador::buscar($pagina, $porPagina);
        $total = Indicador::contar();

        $paginador = new Paginator($total, $pagina, $porPagina, BASE_URL . '/admin/indicadores', $_GET);

        require_once __DIR__ . '/../Views/admin/indicadores.view.php';
    }

    public function comites()
    {
        $pagina = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $porPagina = 8;

        $comites = Comite::buscar($pagina, $porPagina);
        $total = Comite::contar();

        $paginador = new Paginator($total, $pagina, $porPagina, BASE_URL . '/admin/comites', $_GET);

        require_once __DIR__ . '/../Views/admin/comites.view.php';
    }
}
