<?php ob_start(); ?>
<div class="container py-5 text-center" style="min-height: 100vh;">
    <div class="card p-4 shadow col-md-6 mx-auto">
        <h4 class="text-center mb-4 text-danger fw-bold">Registrarse</h4>
        <form method="POST" action="<?= BASE_URL ?>/bolsatrabajo/registro">
            <input name="nombre" class="form-control mb-3" placeholder="Nombre completo" required>
            <input name="email" type="email" class="form-control mb-3" placeholder="Correo electrónico" required>
            <input name="password" type="password" class="form-control mb-3" placeholder="Contraseña" required>
            <select name="tipo" class="form-select mb-3" required>
                <option value="" disabled>Selecciona tu tipo de usuario</option>
                <option value="1">Empresa/Institución</option>
                <option value="2">Estudiante/Egresado</option>
            </select>
            <button class="btn w-100 btn-login mb-3">Registrar</button>
            <a href="<?= BASE_URL ?>/bolsatrabajo/login" class="btn btn-outline-secondary w-100">Volver al inicio de sesión</a>
        </form>
    </div>
</div>
<?php $contenido = ob_get_clean();
require 'layout.php'; ?>