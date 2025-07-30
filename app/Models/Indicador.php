<?php
namespace App\Models;

use App\Models\Conexion;
use PDO;

class Indicador {
    public static function all() {
        $pdo = Conexion::conectar();
        $stmt = $pdo->query("SELECT * FROM indicadores");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function store($descripcion, $cantidad) {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("INSERT INTO indicadores (descripcion, cantidad) VALUES (?, ?)");
        return $stmt->execute([$descripcion, $cantidad]);
    }

    public static function update($id, $descripcion, $cantidad) {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("UPDATE indicadores SET descripcion = ?, cantidad = ? WHERE id = ?");
        return $stmt->execute([$descripcion, $cantidad, $id]);
    }

    public static function destroy($id) {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("DELETE FROM indicadores WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
