<?php

namespace App\Controllers;

use App\Models\Postulacion;

class PostulacionController{

    public function showPostulacionesForm()
    {
        if (!estaAutenticado()) {
            $_SESSION['error'] = "Debes iniciar sesión para postularte.";
            header('Location: ' . BASE_URL . '/bolsatrabajo/login');
            exit;
        }
        $usuarioId = $_SESSION['usuario_id'];
        $postulaciones = Postulacion::postulacionesPorUsuario($usuarioId);
        require_once __DIR__ . '/../Views/bolsatrabajo/postulaciones.view.php';
    }
}