<?php
namespace App\Controllers;

class AdminController{

    public function dashboard(){
        require_once __DIR__ . '/../Views/admin/dashboard.php'; 
    }
}