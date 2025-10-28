<?php

namespace App\Models;

use PDO;

class Convocatoria{
    public static function all() {
        $pdo = Conexion::conectar();
        $stmt = $pdo->query("SELECT c.*, r.nombre AS region 
                              FROM convocatorias c
                              JOIN regiones r ON c.region_id = r.id
                              ORDER BY c.vigencia DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getByUser() {
        $pdo = Conexion::conectar();
        $stmt = $pdo->query("SELECT c.*, r.nombre AS region 
                              FROM convocatorias c
                              JOIN regiones r ON c.region_id = r.id
                              ORDER BY c.vigencia DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}