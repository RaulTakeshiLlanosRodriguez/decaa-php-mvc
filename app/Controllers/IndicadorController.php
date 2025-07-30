<?php

namespace App\Controllers;

use App\Models\Indicador;

class IndicadorController
{
    public function index()
    {
        $indicadores = Indicador::all();
        require_once __DIR__ . '/../Views/home.view.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $descripcion = $_POST['descripcion'] ?? '';
            $cantidad = $_POST['cantidad'] ?? 0;

            Indicador::store($descripcion, $cantidad);

            $_SESSION['mensaje'] = 'Indicador guardado correctamente';
            $_SESSION['tipo'] = 'success';
            header('Location:' . BASE_URL . '/admin/indicadores');
            exit;
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $descripcion = $_POST['descripcion'] ?? '';
            $cantidad = $_POST['cantidad'] ?? 0;

            if ($id) {
                Indicador::update($id, $descripcion, $cantidad);
            }

            $_SESSION['mensaje'] = 'Indicador actualizado correctamente';
            $_SESSION['tipo'] = 'success';

            header('Location:' . BASE_URL . '/admin/indicadores');
            exit;
        }
    }

    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;

            if ($id) {
                Indicador::destroy($id);
            }

            $_SESSION['mensaje'] = 'Indicador eliminado correctamente';
            $_SESSION['tipo'] = 'success';
            header('Location:' . BASE_URL . '/admin/indicadores');
            exit;
        }
    }
}
