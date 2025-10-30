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

    public static function find($id)
    {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("
            SELECT c.*, r.nombre AS region 
            FROM convocatorias c
            JOIN regiones r ON c.region_id = r.id
            WHERE c.id = :id
        ");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("
            INSERT INTO convocatorias 
                (institucion, plazas, tipo_contrato, vigencia, region_id, sueldo, logo, usuario_id)
            VALUES 
                (:institucion, :plazas, :tipo_contrato, :vigencia, :region_id, :sueldo, :logo, :usuario_id)
        ");
        return $stmt->execute([
            'institucion' => $data['institucion'],
            'plazas' => $data['plazas'],
            'tipo_contrato' => $data['tipo_contrato'],
            'vigencia' => $data['vigencia'],
            'region_id' => $data['region_id'],
            'sueldo' => $data['sueldo'],
            'logo' => $data['logo'],
            'usuario_id' => $data['usuario_id']
        ]);
    }

    public static function update($id, $data)
    {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("
            UPDATE convocatorias
            SET 
                institucion = :institucion,
                plazas = :plazas,
                tipo_contrato = :tipo_contrato,
                vigencia = :vigencia,
                region_id = :region_id,
                sueldo = :sueldo,
                logo = :logo
            WHERE id = :id
        ");
        return $stmt->execute([
            'institucion' => $data['institucion'],
            'plazas' => $data['plazas'],
            'tipo_contrato' => $data['tipo_contrato'],
            'vigencia' => $data['vigencia'],
            'region_id' => $data['region_id'],
            'sueldo' => $data['sueldo'],
            'logo' => $data['logo'],
            'id' => $id
        ]);
    }


    public static function destroy($id) {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("DELETE FROM convocatorias WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
