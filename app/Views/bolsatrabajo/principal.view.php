<?php ob_start(); ?>
<section class="container py-5 text-center">
    <h2 class="text-danger fw-bold mb-5">BOLSA LABORAL</h2>
    <div class="row justify-content-center align-items-stretch g-4">
        <!-- Estudiantes y Egresados -->
        <div class="col-md-5">
            <div class="card h-100 border-0 shadow-sm">
                <div class="position-absolute bg-danger text-white px-3 py-1 rounded-top start-0 top-0 fs-6">
                    Estudiantes y Egresados
                </div>
                <img src="<?= BASE_URL ?>/assets/bolsa-estudiantes.jpg" class="card-img-top" alt="Oportunidades laborales">
                <div class="card-body">
                    <h5 class="card-title">Oportunidades laborales</h5>
                    <a href="<?= BASE_URL ?>/bolsatrabajo/postulacion-estudiante" class="btn btn-outline-danger px-4">Postular</a>
                </div>
            </div>
        </div>

        <!-- Empresas e Instituciones -->
        <div class="col-md-5">
            <div class="card h-100 border-0 shadow-sm">
                <div class="position-absolute bg-danger text-white px-3 py-1 rounded-top start-0 top-0 fs-6">
                    Empresas e Instituciones
                </div>
                <img src="<?= BASE_URL ?>/assets/bolsa-empresas.jpg" class="card-img-top" alt="Convocatorias">
                <div class="card-body">
                    <h5 class="card-title">Convocatorias</h5>
                    <a href="#" class="btn btn-outline-danger px-4">Publicar</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $contenido = ob_get_clean();
require 'layout.php'; ?>