<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>BOLSA DE TRABAJO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="shortcut icon" href="<?= BASE_URL ?>/assets/logo-favicon-uns.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/styles.css">
    <script type="module" src="<?=BASE_URL?>/js/main-simple-bolsatrabajo.js"></script>
</head>

<body>
    <header class="header">
        <div class="logo-area">
            <img src="<?= BASE_URL ?>/assets/logo-uns.png" alt="Logo UNS">
            <div class="office-name">
                BOLSA LABORAL UNS
            </div>
        </div>
        <button class="menu-toggle" id="menu-toggle"><i class="fas fa-bars"></i></button>
        <nav class="main-nav" id="main-nav">
            <ul class="nav-menu">
                <li class="has-submenu"><a href="<?= BASE_URL ?>/bolsatrabajo">INICIO</a></li>
                <li class="has-submenu">
                    <a href="#">NOSOTROS</a>
                    <ul class="submenu">
                        <li><a href="<?= BASE_URL ?>/bolsatrabajo/mision">Acerca de</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>