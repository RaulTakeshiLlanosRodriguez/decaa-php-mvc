<?php
namespace App\Models;

use App\Models\Conexion;
use PDO;

class Miembro{

    public static function findByComite($comite_id){
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("SELECT rol, nombre FROM miembros WHERE comite_id = ?");
        $stmt->execute([$comite_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}