<?php
namespace App\Controllers;

use App\Models\Usuario;

class AuthController{
    public function showLoginForm()
    {
        require_once __DIR__ . '/../Views/auth/login.view.php'; 
    }

    public function login() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $usuario = Usuario::validar($email, $password);

        if ($usuario) {
            $_SESSION['usuario'] = $usuario;
            header('Location: ' . BASE_URL . '/admin');
            exit;
        }

        $_SESSION['error'] = 'Credenciales incorrectas';
        header('Location: ' . BASE_URL . '/login');
        exit;
    }

    public function logout() {
        session_destroy();
        header('Location: ' . BASE_URL . '/login');
        exit;
    }
}