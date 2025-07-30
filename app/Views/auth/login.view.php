<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>DECAA Administrativo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="shortcut icon" href="<?=BASE_URL?>/assets/logo-favicon-uns.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=BASE_URL?>/css/styles.css">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card p-4 shadow col-md-6 mx-auto">
            <h4 class="text-center mb-4">Iniciar sesión</h4>
            <form method="POST" action="<?= BASE_URL ?>/login">
                <input type="hidden" name="_token" value="<?= $_SESSION['_token'] ?? '' ?>">
                <input name="email" class="form-control mb-3" placeholder="Email">
                <input name="password" type="password" class="form-control mb-3" placeholder="Clave">
                <button class="btn w-100 btn-login">Ingresar</button>
                <?php if (!empty($_SESSION['error'])): ?>
                    <div class="alert alert-danger mt-3">
                        <?= $_SESSION['error'] ?>
                    </div>
                <?php unset($_SESSION['error']); endif; ?>
            </form>
        </div>
    </div>
</body>

</html>
