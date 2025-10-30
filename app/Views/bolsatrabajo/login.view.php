<?php ob_start(); ?>
<div class="container py-5 text-center" style="min-height: 100vh;">
    <div class="card p-4 shadow col-md-6 mx-auto">
        <h4 class="text-center mb-4">Iniciar sesión</h4>
        <form method="POST" action="<?= BASE_URL ?>/bolsatrabajo/login">
            <input type="hidden" name="_token" value="<?= $_SESSION['_token'] ?? '' ?>">
            <input name="email" class="form-control mb-3" placeholder="Email">
            <input name="password" type="password" class="form-control mb-3" placeholder="Clave">
            <button class="btn w-100 btn-login">Ingresar</button>
            <p class="text-center mb-0">¿No tienes una cuenta?</p>
            <a href="<?= BASE_URL ?>/bolsatrabajo/registro" class="btn btn-outline-danger w-100 mt-2">Registrarse</a>
            <?php if (!empty($_SESSION['error'])): ?>
                <div class="alert alert-danger mt-3">
                    <?= $_SESSION['error'] ?>
                </div>
            <?php unset($_SESSION['error']);
            endif; ?>
        </form>
    </div>
</div>
<?php $contenido = ob_get_clean();
require 'layout.php'; ?>