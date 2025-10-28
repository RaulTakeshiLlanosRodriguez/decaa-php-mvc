<?php

namespace App\Controllers;

use App\Models\Convocatoria;
use App\Models\Postulacion;
use App\Models\Region;

class HomeController
{

    public function decaa()
    {
        require_once __DIR__ . '/../Views/decaa.view.php';
    }

    public function oseil()
    {
        require_once __DIR__ . '/../Views/oseil.view.php';
    }

    public function ogc()
    {
        require_once __DIR__ . '/../Views/ogc.view.php';
    }

    public function olic()
    {
        require_once __DIR__ . '/../Views/olic.view.php';
    }

    public function oaac()
    {
        require_once __DIR__ . '/../Views/oaac.view.php';
    }

    public function acreditacion()
    {
        require_once __DIR__ . '/../Views/acreditacion.view.php';
    }

    public function bolsatrabajomision(){
        require_once __DIR__ . '/../Views/bolsatrabajo/mision.view.php';
    }
    public function bolsatrabajo()
    {
        require_once __DIR__ . '/../Views/bolsatrabajo/principal.view.php';
    }
    public function postulacionestudiante()
    {
        $convocatorias = Convocatoria::all();

        $regiones = Region::all();

        require_once __DIR__ . '/../Views/bolsatrabajo/convocatorias.view.php';
    }
}
