<?php
namespace App\Controllers;

use App\Models\Comite;

class ComiteController{

    public function index(){
        $comites = Comite::allWithMiembros();
        require_once __DIR__ . '/../Views/comites.view.php';
    }
}