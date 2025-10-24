
<?php
ini_set('display_errors', 1);
define('BASE_URL', '/decaa-php-mvc');
?>
<?php
  $tituloPagina = $tituloPagina ?? 'Misión y Visión';
  $mision = $mision ?? 'La Bolsa Laboral UNS conecta a estudiantes y
  egresados con oportunidades laborales y de
  prácticas, fortaleciendo su empleabilidad mediante
  convenios estratégicos con empresas e
  instituciones, acompañados de capacitaciones y
  acompañamiento continuo.';
  $vision = $vision ?? 'Al 2030, la Bolsa Laboral UNS será reconocida como
  una plataforma líder en empleabilidad universitaria,
  que vincula de manera efectiva el talento UNS con
  empresas e instituciones, destacando por la calidad,
  confianza e innovación de sus egresados';
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title><?= htmlspecialchars($tituloPagina) ?></title>
    <link rel="stylesheet" href="<?=BASE_URL?>/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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

  <main class="mv-container">
    <h1 class="mv-title">Misión y Visión</h1>

    <!-- Misión -->
    <section class="mv-section mv-mision">
      <div class="mv-image">
        <img src="<?=BASE_URL?>/assets/img-mision.png" alt="Imagen Misión">
      </div>
      <div class="mv-text">
        <h2><i class="fa-solid fa-bullseye"></i>Misión</h2>
        <p><?= nl2br(htmlspecialchars($mision)) ?></p>
        <blockquote>La misión guía las decisiones presentes y define nuestra razón de ser.</blockquote>
      </div>
    </section>

    <!-- Visión -->
    <section class="mv-section mv-vision">
      <div class="mv-image">
        <img src="<?=BASE_URL?>/assets/img-vision.png" alt="Imagen Visión">
      </div>
      <div class="mv-text">
        <h2><i class="fa-solid fa-eye"></i> Nuestra Visión</h2>
        <p><?= nl2br(htmlspecialchars($vision)) ?></p>
        <blockquote>La visión marca el rumbo: el futuro deseado y medible al que aspiramos.</blockquote>
      </div>
    </section>
  </main>
  </body>
</html>
