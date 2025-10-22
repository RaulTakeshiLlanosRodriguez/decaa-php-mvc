<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DECAA</title>

    <link rel="stylesheet" href="<?=BASE_URL?>/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="<?=BASE_URL?>/assets/logo-favicon-uns.png" type="image/png">

    <script type="module" src="<?=BASE_URL?>/js/main-simple.js"></script>
</head>

<body>
    <header class="header">
        <div class="logo-area">
            <img src="<?=BASE_URL?>/assets/logo-uns.png" alt="Logo UNS">
            <div class="office-name">
                DIRECCIÓN DE EVALUACIÓN DE LA CALIDAD ACADÉMICA Y ACREDITACIÓN
            </div>
        </div>
        <button class="menu-toggle" id="menu-toggle"><i class="fas fa-bars"></i></button>
        <nav class="main-nav" id="main-nav">
            <ul class="nav-menu">
                <li class="has-submenu"><a href="<?=BASE_URL?>/">INICIO</a></li>
                <li class="has-submenu">
                    <a href="#">NOSOTROS</a>
                    <ul class="submenu">
                        <li><a href="<?=BASE_URL?>/nosotros">Acerca del DECAA</a></li>
                        <li><a href="<?=BASE_URL?>/oseil">Oficina de Seguimiento al Egresado y de Inserción Laboral</a>
                        </li>
                        <li><a href="<?=BASE_URL?>/ogc">Oficina de Gestión de Calidad</a></li>
                        <li><a href="<?=BASE_URL?>/oaac">Oficina de Autoevaluación y Acreditación de la Calidad</a>
                        </li>
                        <li><a href="<?=BASE_URL?>/olic">Oficina de Licenciamiento</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#">INNOVACIONES</a>
                    <ul class="submenu">
                        <li><a href="<?=BASE_URL?>/innovaciones">Publicaciones</a></li>
                        <li><a href="<?=BASE_URL?>/publicaciones">Investigaciones</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#">MEJORA CONTINUA</a>
                    <ul class="submenu">
                        <li><a href="<?=BASE_URL?>/comites">Comités de calidad</a></li>
                        <li><a href="<?=BASE_URL?>/acreditacion">Acreditación</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>

    <div class="franja-inferior"></div>

    <section class="slider-solo-imagenes">
        <div class="slider-track">
            <img src="<?=BASE_URL?>/assets/foto1.jpg" alt="foto 1">
            <img src="<?=BASE_URL?>/assets/foto2.jpg"
                alt="foto 2">
            <img src="<?=BASE_URL?>/assets/foto3.jpeg"
                alt="foto 3">     
        </div>
    </section>
