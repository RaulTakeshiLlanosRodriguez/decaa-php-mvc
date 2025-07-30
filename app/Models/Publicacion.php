<?php
namespace App\Models;

use App\Models\Conexion;
use PDO;

class Publicacion{
    public $id;
    public $titulo;
    public $docente;
    public $anio;
    public $carrera;
    public $enlace;
    public $activo;

    public static function buscar($filtros = [], $pagina = 1, $porPagina = 5)
    {
        $pdo = Conexion::conectar();
        $offset = ($pagina - 1) * $porPagina;

        $sql = "SELECT * FROM publicaciones WHERE activo = 1";
        $params = [];

        // Aplicar filtros
        if (!empty($filtros['docente'])) {
            $sql .= " AND docente LIKE ?";
            $params[] = '%' . $filtros['docente'] . '%';
        }

        if (!empty($filtros['titulo'])) {
            $sql .= " AND titulo LIKE ?";
            $params[] = '%' . $filtros['titulo'] . '%';
        }

        if (!empty($filtros['anio'])) {
            $sql .= " AND anio = ?";
            $params[] = $filtros['anio'];
        }

        if (!empty($filtros['carrera'])) {
            $sql .= " AND carrera = ?";
            $params[] = $filtros['carrera'];
        }

        $sql .= " ORDER BY anio DESC LIMIT $porPagina OFFSET $offset";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function contar($filtros = [])
    {
        $pdo = Conexion::conectar();

        $sql = "SELECT COUNT(*) FROM publicaciones WHERE activo = 1";
        $params = [];

        if (!empty($filtros['docente'])) {
            $sql .= " AND docente LIKE ?";
            $params[] = '%' . $filtros['docente'] . '%';
        }

        if (!empty($filtros['titulo'])) {
            $sql .= " AND titulo LIKE ?";
            $params[] = '%' . $filtros['titulo'] . '%';
        }

        if (!empty($filtros['anio'])) {
            $sql .= " AND anio = ?";
            $params[] = $filtros['anio'];
        }

        if (!empty($filtros['carrera'])) {
            $sql .= " AND carrera = ?";
            $params[] = $filtros['carrera'];
        }

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return (int) $stmt->fetchColumn();
    }

    public static function obtenerAnios()
    {
        $pdo = Conexion::conectar();
        $stmt = $pdo->query("SELECT DISTINCT anio FROM publicaciones WHERE activo = 1 ORDER BY anio DESC");
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public static function obtenerCarreras()
    {
        $pdo = Conexion::conectar();
        $stmt = $pdo->query("SELECT DISTINCT carrera FROM publicaciones WHERE activo = 1 ORDER BY carrera");
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function save(){
        $pdo = Conexion::conectar();
        if ($this->id) {
            $stmt = $pdo->prepare("UPDATE publicaciones SET titulo = ?, docente = ?, anio = ?, carrera = ?, enlace = ?, activo = ? WHERE id = ?");
            return $stmt->execute([
                $this->titulo,
                $this->docente,
                $this->anio,
                $this->carrera,
                $this->enlace,
                $this->activo,
                $this->id
            ]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO publicaciones (titulo, docente, anio, carrera, enlace, activo) VALUES (?, ?, ?, ?, ?, ?)");
            return $stmt->execute([
                $this->titulo,
                $this->docente,
                $this->anio,
                $this->carrera,
                $this->enlace,
                $this->activo
            ]);
        }
    }
    public static function destroy($id){
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("DELETE FROM publicaciones WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function findById($id){
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("SELECT * FROM publicaciones WHERE id = ?");
        $stmt->execute([$id]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            $pub = new self();
            foreach ($data as $key => $value) {
                $pub->$key = $value;
            }
            return $pub;
        }
        return null;
    }
}