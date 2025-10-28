<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>BOLSA LABORAL Estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="shortcut icon" href="<?= BASE_URL ?>/assets/logo-favicon-uns.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="bg-light">
    <div class="d-flex" style="min-height: 100vh;">
        <nav class="bg-danger text-white p-3 d-flex flex-column justify-content-between" style="width: 220px;">
            <div>
                <h4 class="titulo-panel">BOLSA LABORAL</h4>
                <ul class="nav flex-column mt-4">
                    <li class="nav-item mb-2">
                        <a class="nav-link <?= isActive('/bolsatrabajo/estudiante') ? 'bg-white text-danger rounded px-3 py-2' : 'text-white' ?>" href="<?= BASE_URL ?>/bolsatrabajo/estudiante">
                            <i class="fas fa-book me-2"></i>Convocatorias
                        </a>
                    </li>
                </ul>
            </div>
            <div class="mb-3 text-center">
                <a href="<?= BASE_URL ?>/bolsatrabajo/logout" class="btn btn-outline-light"><i class="fas fa-sign-out-alt me-1"></i>
                    Cerrar sesión</a>
            </div>
        </nav>

        <main class="flex-grow-1 p-2">
            <?php if (isset($contenido)) echo $contenido; ?>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
