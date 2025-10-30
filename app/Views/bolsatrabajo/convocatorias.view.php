<?php ob_start(); ?>
<section class="container py-5 text-center">
    <h2 class="text-center text-danger">BOLSA LABORAL</h2>

    <div class="filtro-container d-flex justify-content-end my-4">
        <input type="text" class="form-control w-50 me-3" placeholder="Escribe tu carrera: Derecho, Ingeniería" id="inputCarrera">
        <select class="form-select w-25" id="selectRegion">
            <option>Todo el país</option>
            <?php foreach ($regiones as $region): ?>
                <option><?= $region['nombre'] ?></option>
            <?php endforeach; ?>
        </select>
        <button class="btn btn-danger ms-2 px-4" id="btnBuscar">Buscar</button>
    </div>
    <div class="filtro-container d-flex justify-content-start my-4">
        <?php if (estaAutenticado()): ?>
            <a href="<?= BASE_URL ?>/bolsatrabajo/mis-postulaciones" class="btn btn-outline-primary me-2">Mis Postulaciones</a>
            <a href="<?= BASE_URL ?>/bolsatrabajo/logout" class="btn btn-outline-danger">Cerrar Sesión</a>
        <?php else: ?>
            <a href="<?= BASE_URL ?>/bolsatrabajo/login" class="btn btn-outline-danger">Iniciar Sesión</a>
        <?php endif; ?>
    </div>
    <?php if (!empty($_SESSION['mensaje'])): ?>
        <div class="alert alert-success mt-3">
            <?= $_SESSION['mensaje'] ?>
        </div>
        <?php unset($_SESSION['mensaje']); ?>
    <?php endif; ?>
    <?php if (!empty($_SESSION['error'])): ?>
        <div class="alert alert-danger mt-3">
            <?= $_SESSION['error'] ?>
        </div>
    <?php unset($_SESSION['error']);
    endif; ?>

    <div class="row" id="contenedorConvocatorias">
        <?php foreach ($convocatorias as $item): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <img src="<?= BASE_URL . '/public/' . $item['logo'] ?>" alt="Logo" style="height:40px; margin-right:10px;">
                            <h6 class="m-0"><?= $item['institucion'] ?></h6>
                        </div>
                        <p class="mb-1"><strong><?= $item['plazas'] ?></strong> plazas | Contrato "<strong><?= $item['tipo_contrato'] ?></strong>"</p>
                        <p class="mb-1 text-danger"><i class="fas fa-calendar-alt"></i> Vigente hasta el <?= $item['vigencia'] ?></p>
                        <p class="mb-1"><i class="fas fa-map-marker-alt"></i> <?= $item['region'] ?></p>
                        <p class="mb-3"><i class="fas fa-money-bill-wave"></i> <?= $item['sueldo'] ?></p>
                        <form action="<?= BASE_URL ?>/bolsatrabajo/postular" method="POST">
                            <input type="hidden" name="convocatoria_id" value="<?= $item['id'] ?>">
                            <button type="submit" class="btn btn-outline-danger btn-sm w-100">POSTULAR</button>
                        </form>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <span class="me-2">Compartir en:</span>
                        <i class="fab fa-facebook mx-1"></i>
                        <i class="fab fa-linkedin mx-1"></i>
                        <i class="fab fa-twitter mx-1"></i>
                        <i class="fab fa-whatsapp mx-1"></i>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<?php $contenido = ob_get_clean();
require 'layout.php'; ?>