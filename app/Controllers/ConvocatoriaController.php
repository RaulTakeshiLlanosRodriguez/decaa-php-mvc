<?php

namespace App\Controllers;

class ConvocatoriaController{

    public function showConvocatoriaEmpresaForm()
    {
        require_once __DIR__ . '/../Views/bolsatrabajo/empresas.view.php';
    }
}