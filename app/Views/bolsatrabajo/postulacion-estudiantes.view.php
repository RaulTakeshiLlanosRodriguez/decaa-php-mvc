<?php ob_start(); ?>
<section class="container py-5 text-center">
    <h2 class="text-center text-danger">BOLSA LABORAL</h2>

    <div class="filtro-container d-flex justify-content-end my-4">
        <input type="text" class="form-control w-50 me-3" placeholder="Escribe tu carrera: Derecho, Ingeniería" id="inputCarrera">
        <select class="form-select w-25" id="selectRegion">
            <option>Todo el país</option>
            <option>Amazonas</option>
            <option>Áncash</option>
            <option>Apurímac</option>
            <option>Arequipa</option>
            <option>Ayacucho</option>
            <option>Cusco</option>
            <option>Lima</option>
        </select>
        <button class="btn btn-danger ms-2 px-4" id="btnBuscar">Buscar</button>
    </div>

    <div class="row" id="contenedorConvocatorias">
        <?php foreach ($convocatorias as $item): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <img src="<?= $item['logo'] ?>" alt="Logo" style="height:40px; margin-right:10px;">
                            <h6 class="m-0"><?= $item['institucion'] ?></h6>
                        </div>
                        <p class="mb-1"><strong><?= $item['plazas'] ?></strong> plazas | Contrato "<strong><?= $item['tipo_contrato'] ?></strong>"</p>
                        <p class="mb-1 text-danger"><i class="fas fa-calendar-alt"></i> Vigente hasta el <?= $item['vigencia'] ?></p>
                        <p class="mb-1"><i class="fas fa-map-marker-alt"></i> <?= $item['region'] ?></p>
                        <p class="mb-3"><i class="fas fa-money-bill-wave"></i> <?= $item['sueldo'] ?></p>
                        <a href="#" class="btn btn-outline-danger btn-sm w-100">VER CONVOCATORIA</a>
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