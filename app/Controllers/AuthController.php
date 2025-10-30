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

    public function showRegistroFormBolsaTrabajo(){
        require_once __DIR__ . '/../Views/bolsatrabajo/registro.view.php'; 
    }

    public function registro()
    {
        
        $name = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $tipo = $_POST['tipo'];

        $usuario = new Usuario();
        $usuario->create($name, $email, $password, $tipo);

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
            $_SESSION['usuario_id'] = $_SESSION['usuario']['id'];

            if ($_SESSION['usuario']['tipo'] == 1) {
                header('Location: ' . BASE_URL . '/bolsatrabajo/empresas');
            } else {
                header('Location: ' . BASE_URL . '/bolsatrabajo/postulacion-estudiante');
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

    public function logoutBolsaTrabajo() {
        session_destroy();
        header('Location: ' . BASE_URL . '/bolsatrabajo');
        exit;
    }
}