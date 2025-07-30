<?php
namespace App\Models;

use PDO;
use PDOException;

class Conexion {
    private static $conexion;

    public static function conectar() {
        if (!self::$conexion) {
            try {
                $host = DB_HOST;
                $dbname = DB_NAME;
                $usuario = DB_USER;
                $clave = DB_PASS;

                self::$conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $clave);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Error de conexión: " . $e->getMessage());
            }
        }
        return self::$conexion;
    }
}
