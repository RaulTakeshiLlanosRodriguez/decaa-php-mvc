<?php
namespace App\Controllers;

use App\Models\Usuario;

class AuthController{
    public function showLoginForm()
    {
        require_once __DIR__ . '/../Views/auth/login.view.php'; 
    }

    public function showLoginFormBolsaTrabajo()
    {
        require_once __DIR__ . '/../Views/bolsatrabajo/login.view.php'; 
    }

    public function registro()
    {

        $email = $_POST['email'];
        $password = $_POST['password'];
        $tipo = $_POST['tipo'];

        $usuario = new Usuario();
        $usuario->create($email, $password, $tipo);

        $_SESSION['mensaje'] = 'Usuario registrado correctamente';
        header('Location: ' . BASE_URL . '/bolsatrabajo/login');
        exit;
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

    public function bolsatrabajoLogin() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $usuario = Usuario::validar($email, $password);

        if ($usuario) {
            $_SESSION['usuario'] = $usuario;

            if ($_SESSION['usuario']['tipo'] == 1) {
                header('Location: ' . BASE_URL . '/bolsatrabajo/empresa/convocatorias');
            } else {
                header('Location: ' . BASE_URL . '/bolsatrabajo/estudiante/convocatorias');
            }

            exit;
        }

        $_SESSION['error'] = 'Credenciales incorrectas';
        header('Location: ' . BASE_URL . '/bolsatrabajo/login');
        exit;
    }

    public function logout() {
        session_destroy();
        header('Location: ' . BASE_URL . '/login');
        exit;
    }
}