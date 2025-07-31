<?php

namespace App\Controllers;

use App\Models\Comite;

class ComiteController
{

    public function index()
    {
        $comites = Comite::allWithMiembros();
        require_once __DIR__ . '/../Views/comites.view.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $carrera = $_POST['carrera'] ?? null;;

            Comite::store($carrera);

            $_SESSION['mensaje'] = 'Comité agregado correctamente';
            $_SESSION['tipo'] = 'success';

            header('Location: ' . BASE_URL . '/admin/comites');
            exit;
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $carrera = $_POST['carrera'] ?? null;

            if ($id) {
                Comite::update($id, $carrera);

                $_SESSION['mensaje'] = 'Comité actualizado correctamente';
                $_SESSION['tipo'] = 'success';
            }

            header('Location: ' . BASE_URL . '/admin/comites');
            exit;
        }
    }

    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;

            if ($id) {
                Comite::destroy($id);

                $_SESSION['mensaje'] = 'Comité eliminado correctamente';
                $_SESSION['tipo'] = 'success';
            }

            header('Location: ' . BASE_URL . '/admin/comites');
            exit;
        }
    }
}
