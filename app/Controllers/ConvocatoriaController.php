<?php

namespace App\Controllers;

use App\Models\Convocatoria;
use App\Models\Postulacion;

class ConvocatoriaController
{

    public function showConvocatoriaEmpresaForm()
    {
        $usuarioId = $_SESSION['usuario_id'];
        $convocatorias = Convocatoria::convocatoriaPorUsuario($usuarioId);
        require_once __DIR__ . '/../Views/bolsatrabajo/empresas.view.php';
    }

    public function postular()
    {

        $convocatoriaId = $_POST['convocatoria_id'] ?? null;

        if (!$convocatoriaId) {
            $_SESSION['error'] = "Convocatoria no válida.";
            header('Location: ' . BASE_URL . '/bolsatrabajo');
            exit;
        }

        if (!estaAutenticado()) {
            $_SESSION['error'] = "Debes iniciar sesión para postularte.";
            header('Location: ' . BASE_URL . '/bolsatrabajo/login');
            exit;
        }

        $usuarioId = $_SESSION['usuario_id'];

        if (Postulacion::yaPostulo($usuarioId, $convocatoriaId)) {
            $_SESSION['error'] = "Ya te has postulado a esta convocatoria.";
            header('Location: ' . BASE_URL . '/bolsa-trabajo/postulacion-estudiante');
            exit;
        }


        $postulacion = new Postulacion();
        $postulacion->usuario_id = $usuarioId;
        $postulacion->convocatoria_id = $convocatoriaId;
        $postulacion->save();
        $_SESSION['mensaje'] = "Te has postulado exitosamente.";
        header('Location: ' . BASE_URL . '/bolsa-trabajo/postulacion-estudiante');
        exit;
    }
}
