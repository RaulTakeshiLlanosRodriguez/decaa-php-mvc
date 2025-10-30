<?php
namespace App\Models;

use App\Models\Conexion;
use PDO;

class Usuario{
    public static function validar($email, $password) {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($password, $usuario['password'])) {
            return $usuario;
        }
        return false;
    }

    public function create($name, $email, $password, $tipo)
    {
        $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, tipo) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT), $tipo]);
    }
}