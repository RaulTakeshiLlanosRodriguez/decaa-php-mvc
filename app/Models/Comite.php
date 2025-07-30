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

}