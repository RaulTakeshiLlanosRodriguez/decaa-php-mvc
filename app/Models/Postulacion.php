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

    public static function postulacionesPorUsuario($usuarioId)
    {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("
        SELECT 
            p.id AS postulacion_id,
            c.id AS convocatoria_id,
            c.institucion,
            c.plazas,
            c.tipo_contrato,
            c.vigencia,
            r.nombre AS region,
            c.sueldo,
            c.logo,
            p.fecha_postulacion
        FROM postulaciones p
        INNER JOIN convocatorias c ON p.convocatoria_id = c.id
        INNER JOIN regiones r ON c.region_id = r.id
        WHERE p.usuario_id = :usuario_id
        ORDER BY p.fecha_postulacion DESC
    ");
        $stmt->execute(['usuario_id' => $usuarioId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
