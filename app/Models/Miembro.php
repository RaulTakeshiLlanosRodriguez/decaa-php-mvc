<?php

namespace App\Models;

use App\Models\Conexion;
use PDO;

class Miembro
{

    public static function findByComite($comite_id)
    {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("SELECT rol, nombre FROM miembros WHERE comite_id = ?");
        $stmt->execute([$comite_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById($id)
    {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("SELECT * FROM miembros WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function store($comite_id, $rol, $nombre)
    {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("INSERT INTO miembros (comite_id, rol, nombre) VALUES (?, ?, ?)");
        return $stmt->execute([$comite_id, $rol, $nombre]);
    }

    public static function update($id, $rol, $nombre)
    {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("UPDATE miembros SET rol = ?, nombre = ? WHERE id = ?");
        return $stmt->execute([$rol, $nombre, $id]);
    }

    public static function destroy($id)
    {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("DELETE FROM miembros WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function buscar($comite_id, $pagina = 1, $porPagina = 8)
    {
        $pdo = Conexion::conectar();
        
        // Convertir a enteros para evitar inyección SQL
        $pagina = (int) $pagina;
        $porPagina = (int) $porPagina;
        $offset = ($pagina - 1) * $porPagina;
        
        $sql = "SELECT * FROM miembros 
                WHERE comite_id = ? 
                ORDER BY nombre ASC 
                LIMIT $porPagina OFFSET $offset";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$comite_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function contar($comite_id)
    {
        $pdo = Conexion::conectar();

        $sql = "SELECT COUNT(*) FROM miembros WHERE comite_id = ?";
        $params = [$comite_id];

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return (int) $stmt->fetchColumn();
    }
}
