<?php
namespace App\Controllers;

use App\Models\Comite;
use App\Models\Miembro;
use Core\Paginator;

class MiembroController{
    
    public function index(){
        $comite_id = $_GET['comite'] ?? null;

        if (!$comite_id) {
            $_SESSION['mensaje'] = 'No se especificó el comité';
            $_SESSION['tipo'] = 'error';
            header('Location: ' . BASE_URL . '/admin/comites');
            exit;
        }
        $pagina = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $porPagina = 8;
        $miembros = Miembro::buscar($comite_id, $pagina, $porPagina);

        $total = Miembro::contar($comite_id);

        $paginador = new Paginator($total, $pagina, $porPagina, BASE_URL . '/admin/comites', $_GET);

        $comite = Comite::findById($comite_id);
        require_once __DIR__ . '/../Views/admin/miembros.view.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $comite_id = $_POST['comite_id'] ?? null;
            $rol = $_POST['rol'] ?? '';
            $nombre = $_POST['nombre'] ?? '';
            
            if ($comite_id) {
                Miembro::store($comite_id, $rol, $nombre);
                
                $_SESSION['mensaje'] = 'Miembro agregado correctamente';
                $_SESSION['tipo'] = 'success';
            }
            
            header('Location: ' . BASE_URL . '/admin/miembros?comite=' . $comite_id);
            exit;
        }
    }
    
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $rol = $_POST['rol'] ?? '';
            $nombre = $_POST['nombre'] ?? '';
            
            if ($id) {
                $miembro = Miembro::findById($id);
                $comite_id = $miembro['comite_id'];
                Miembro::update($id, $rol, $nombre);
                
                $_SESSION['mensaje'] = 'Miembro actualizado correctamente';
                $_SESSION['tipo'] = 'success';
            } 
            
            header('Location: ' . BASE_URL . '/admin/miembros?comite=' . $comite_id);
            exit;
        }
    }
    
    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            
            if ($id) {
                $miembro = Miembro::findById($id);
                $comite_id = $miembro['comite_id'];
                Miembro::destroy($id);
                
                $_SESSION['mensaje'] = 'Miembro eliminado correctamente';
                $_SESSION['tipo'] = 'success';
            }
            
            header('Location: ' . BASE_URL . '/admin/miembros?comite=' . $comite_id);
            exit;
        }
    }
}