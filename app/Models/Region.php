<?php

namespace App\Models;

use PDO;

class Region{
    public static function all() {
        $pdo = Conexion::conectar();
        $stmt = $pdo->query("SELECT * FROM regiones");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}