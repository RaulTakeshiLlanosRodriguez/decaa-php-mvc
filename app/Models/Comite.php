<?php
namespace App\Models;

use App\Models\Conexion;
use PDO;

class Comite{

    public static function allWithMiembros(){
        $pdo = Conexion::conectar();

        $stmt = $pdo->query("SELECT * FROM comites");
        $comites = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($comites as &$comite) {
            $comite['miembros'] = Miembro::findByComite($comite['id']);
        }

        return $comites;
    }

    public static function buscar( $pagina = 1, $porPagina = 5)
    {
        $pdo = Conexion::conectar();
        $offset = ($pagina - 1) * $porPagina;

        $sql = "SELECT * FROM comites";
        $params = [];

        $sql .= " ORDER BY id ASC LIMIT $porPagina OFFSET $offset";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function contar()
    {
        $pdo = Conexion::conectar();

        $sql = "SELECT COUNT(*) FROM comites";
        $params = [];

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return (int) $stmt->fetchColumn();
    }

    public static function findById($id)
    {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("SELECT * FROM comites WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}