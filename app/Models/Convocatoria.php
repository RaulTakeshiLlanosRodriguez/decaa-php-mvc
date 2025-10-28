<?php

namespace App\Models;

use PDO;

class Convocatoria
{
    public static function all()
    {
        $pdo = Conexion::conectar();
        $stmt = $pdo->query("SELECT c.*, r.nombre AS region 
                              FROM convocatorias c
                              JOIN regiones r ON c.region_id = r.id
                              ORDER BY c.vigencia DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getByUser()
    {
        $pdo = Conexion::conectar();
        $stmt = $pdo->query("SELECT c.*, r.nombre AS region 
                              FROM convocatorias c
                              JOIN regiones r ON c.region_id = r.id
                              ORDER BY c.vigencia DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function convocatoriaPorUsuario($usuarioId)
    {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("SELECT c.*, r.nombre AS region 
                           FROM convocatorias c
                           JOIN regiones r ON c.region_id = r.id
                           WHERE c.usuario_id = :usuario_id
                           ORDER BY c.vigencia DESC");
        $stmt->execute(['usuario_id' => $usuarioId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
