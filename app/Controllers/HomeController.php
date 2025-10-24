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

    public function bolsatrabajomision(){
        require_once __DIR__ . '/../Views/bolsatrabajo/mision.view.php';
    }
}
