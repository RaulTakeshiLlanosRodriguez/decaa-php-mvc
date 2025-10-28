<?php

namespace App\Models;

use PDO;

class Postulacion
{
    public $usuario_id;
    public $convocatoria_id;

    public static function yaPostulo($usuarioId, $convocatoriaId)
    {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM postulaciones WHERE usuario_id = ? AND convocatoria_id = ?");
        $stmt->execute([$usuarioId, $convocatoriaId]);
        $count = $stmt->fetchColumn();

        return $count > 0;
    }

    public function save()
    {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("INSERT INTO postulaciones (usuario_id, convocatoria_id, fecha_postulacion) VALUES (?, ?, NOW())");
        return $stmt->execute([$this->usuario_id, $this->convocatoria_id]);
    }
}
