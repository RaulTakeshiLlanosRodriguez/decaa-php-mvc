<?php ob_start(); ?>
<section class="container py-5">
    <?php if (!empty($convocatoria)): ?>
        <div class="card card-convocatoria">
            <div class="card-header">
                <?= htmlspecialchars($convocatoria['institucion']) ?>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img src="<?= BASE_URL . '/public/' . htmlspecialchars($convocatoria['logo']) ?>"
                            alt="Logo de <?= htmlspecialchars($convocatoria['institucion']) ?>"
                            class="img-logo">
                    </div>
                    <div class="col-md-8">
                        <h2 class="text-danger"><?= htmlspecialchars($convocatoria['carrera']) ?></h2>
                        <p><strong>Plazas disponibles:</strong> <?= htmlspecialchars($convocatoria['plazas']) ?></p>
                        <p><strong>Tipo de contrato:</strong> <?= htmlspecialchars($convocatoria['tipo_contrato']) ?></p>
                        <p><strong>Región:</strong> <?= htmlspecialchars($convocatoria['region']) ?></p>
                        <p><strong>Sueldo:</strong> <?= htmlspecialchars($convocatoria['sueldo']) ?></p>
                        <p><strong>Vigencia hasta:</strong> <?= htmlspecialchars($convocatoria['vigencia']) ?></p>

                        <?php if (!empty($convocatoria['descripcion'])): ?>
                            <hr>
                            <p><strong>Descripción del puesto:</strong></p>
                            <p class="text-muted"><?= nl2br(htmlspecialchars($convocatoria['descripcion'])) ?></p>
                        <?php endif; ?>

                        <?php if (!empty($convocatoria['requisitos'])): ?>
                            <p><strong>Requisitos:</strong></p>
                            <ul>
                                <?php foreach (explode("\n", $convocatoria['requisitos']) as $req): ?>
                                    <li><?= htmlspecialchars(trim($req)) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div>
                    <form action="<?= BASE_URL ?>/bolsatrabajo/postular" method="POST" class="d-inline">
                        <input type="hidden" name="convocatoria_id" value="<?= htmlspecialchars($convocatoria['id'] ?? 0) ?>">
                        <button type="submit" class="btn-custom">Postular</button>
                    </form>
                    <a href="<?= BASE_URL ?>/bolsatrabajo" class="btn-outline-secondary ms-2">Volver</a>
                </div>

                <!-- Iconos de compartir -->
                <div class="share-icons">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(BASE_URL . '/bolsatrabajo/detalle') ?>" target="_blank"><i class="fab fa-facebook"></i></a>
                    <a href="https://twitter.com/intent/tweet?url=<?= urlencode(BASE_URL . '/bolsatrabajo/detalle') ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://api.whatsapp.com/send?text=<?= urlencode('Mira esta convocatoria laboral: ' . BASE_URL . '/bolsatrabajo/detalle') ?>" target="_blank"><i class="fab fa-whatsapp"></i></a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= urlencode(BASE_URL . '/bolsatrabajo/detalle') ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>

    <?php else: ?>
        <div class="alert alert-warning text-center">
            <p>No se encontró la convocatoria solicitada.</p>
            <a href="<?= BASE_URL ?>/bolsatrabajo" class="btn btn-outline-secondary mt-3">Volver</a>
        </div>
    <?php endif; ?>
</section>
<?php $contenido = ob_get_clean();
require 'layout.php'; ?>