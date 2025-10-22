<?php
namespace App\Controllers;

class HomeController{

    public function decaa(){
        require_once __DIR__ . '/../Views/decaa.view.php';
    }

    public function oseil(){
        require_once __DIR__ . '/../Views/oseil.view.php';
    }

    public function ogc(){
        require_once __DIR__ . '/../Views/ogc.view.php';
    }

    public function olic(){
        require_once __DIR__ . '/../Views/olic.view.php';
    }
    
    public function oaac(){
        require_once __DIR__ . '/../Views/oaac.view.php';
    }

    public function acreditacion(){
        require_once __DIR__ . '/../Views/acreditacion.view.php';
    }

    public function bolsatrabajo(){
        require_once __DIR__ . '/../Views/bolsatrabajo/principal.view.php';
    }
    public function postulacionestudiante()
{
    $convocatorias = [
        [
            'institucion' => 'MUNICIPALIDAD DE JEPELACIO',
            'plazas' => 5,
            'tipo_contrato' => 'CAS',
            'vigencia' => '26/09/2025',
            'region' => 'San Martín',
            'sueldo' => 'S/. 1500 y S/. 3000 Soles',
            'logo' => BASE_URL . '/assets/DECAA organigrama.png'
        ],
        [
            'institucion' => 'PRONABEC',
            'plazas' => 1,
            'tipo_contrato' => 'CAS',
            'vigencia' => '26/09/2025',
            'region' => 'Lima',
            'sueldo' => 'S/. 3500 Soles',
            'logo' => BASE_URL . '/assets/DECAA organigrama.png'
        ],
        [
            'institucion' => 'SINEACE',
            'plazas' => 1,
            'tipo_contrato' => 'CAS',
            'vigencia' => '26/12/2025',
            'region' => 'Lima',
            'sueldo' => 'S/. 4000 Soles',
            'logo' => BASE_URL . '/assets/DECAA organigrama.png'
        ],
        [
            'institucion' => 'PODER JUDICIAL',
            'plazas' => 1,
            'tipo_contrato' => 'CAS',
            'vigencia' => '16/12/2025',
            'region' => 'Áncash',
            'sueldo' => 'S/. 2000 Soles',
            'logo' => BASE_URL . '/assets/DECAA organigrama.png'
        ],
        [
            'institucion' => 'Tienda EFE',
            'plazas' => 1,
            'tipo_contrato' => 'Planilla',
            'vigencia' => '20/12/2025',
            'region' => 'Áncash',
            'sueldo' => 'S/. 1400 Soles',
            'logo' => BASE_URL . '/assets/DECAA organigrama.png'
        ],
        [
            'institucion' => 'BCP',
            'plazas' => 1,
            'tipo_contrato' => 'RXH',
            'vigencia' => '12/12/2025',
            'region' => 'Áncash',
            'sueldo' => 'S/. 2200 Soles',
            'logo' => BASE_URL . '/assets/DECAA organigrama.png'
        ],
    ];

    require_once __DIR__ . '/../Views/bolsatrabajo/postulacion-estudiantes.view.php';
}
}
