<?php

namespace App\Models;

use App\Models\Conexion;
use PDO;

class Archivo
{
    public $id;
    public $descripcion;
    public $enlace;
    public $ruta_archivo;

    public function save()
    {
        $pdo = Conexion::conectar();
        if ($this->id) {
            $stmt = $pdo->prepare("UPDATE archivos SET descripcion = ?, enlace = ?, ruta_archivo = ? WHERE id = ?");
            return $stmt->execute([
                $this->descripcion,
                $this->enlace,
                $this->ruta_archivo,
                $this->id
            ]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO archivos (descripcion, enlace, ruta_archivo) VALUES (?, ?, ?)");
            return $stmt->execute([
                $this->descripcion,
                $this->enlace,
                $this->ruta_archivo
            ]);
        }
    }

    public static function all()
    {
        $pdo = Conexion::conectar();
        $stmt = $pdo->query("SELECT * FROM archivos ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById($id)
    {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("SELECT * FROM archivos WHERE id = ?");
        $stmt->execute([$id]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            $archivo = new self();
            foreach ($data as $key => $value) {
                $archivo->$key = $value;
            }
            return $archivo;
        }
        return null;
    }

    public static function destroy($id)
    {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("DELETE FROM archivos WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function buscar($pagina = 1, $porPagina = 8)
    {
        $pdo = Conexion::conectar();
        $offset = ($pagina - 1) * $porPagina;

        $stmt = $pdo->prepare("SELECT * FROM archivos ORDER BY id DESC LIMIT $porPagina OFFSET $offset");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function contar()
    {
        $pdo = Conexion::conectar();
        $stmt = $pdo->query("SELECT COUNT(*) FROM archivos");
        return (int) $stmt->fetchColumn();
    }
}
