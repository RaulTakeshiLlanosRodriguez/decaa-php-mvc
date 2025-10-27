<?php ob_start(); ?>
<main class="mv-container">
  <h1 class="mv-title">Misión y Visión</h1>

  <!-- Misión -->
  <section class="mv-section mv-mision">
    <div class="mv-image">
      <img src="<?= BASE_URL ?>/assets/img-mision.png" alt="Imagen Misión">
    </div>
    <div class="mv-text">
      <h2><i class="fa-solid fa-bullseye"></i>Misión</h2>
      <p>La Bolsa Laboral UNS conecta a estudiantes y
        egresados con oportunidades laborales y de
        prácticas, fortaleciendo su empleabilidad mediante
        convenios estratégicos con empresas e
        instituciones, acompañados de capacitaciones y
        acompañamiento continuo.</p>
      <blockquote>La misión guía las decisiones presentes y define nuestra razón de ser.</blockquote>
    </div>
  </section>

  <!-- Visión -->
  <section class="mv-section mv-vision">
    <div class="mv-image">
      <img src="<?= BASE_URL ?>/assets/img-vision.png" alt="Imagen Visión">
    </div>
    <div class="mv-text">
      <h2><i class="fa-solid fa-eye"></i> Nuestra Visión</h2>
      <p>Al 2030, la Bolsa Laboral UNS será reconocida como
        una plataforma líder en empleabilidad universitaria,
        que vincula de manera efectiva el talento UNS con
        empresas e instituciones, destacando por la calidad,
        confianza e innovación de sus egresados</p>
      <blockquote>La visión marca el rumbo: el futuro deseado y medible al que aspiramos.</blockquote>
    </div>
  </section>
</main>
<?php $contenido = ob_get_clean();
require 'layout.php'; ?>