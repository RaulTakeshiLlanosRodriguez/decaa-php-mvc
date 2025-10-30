<?php ob_start(); ?>
<section class="container py-5 text-center" style="min-height: 100vh;">
    <h2 class="text-center text-danger mb-4">Mis Postulaciones</h2>

    <div class="text-start mb-4">
        <a href="<?= BASE_URL ?>/bolsatrabajo/postulacion-estudiante" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Volver a Convocatorias
        </a>
    </div>

    <?php if (empty($postulaciones)): ?>
        <div class="alert alert-warning">No tienes postulaciones registradas.</div>
    <?php else: ?>
         <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-danger">
                    <tr>
                        <th>INSTITUCION</th>
                        <th>TIPO DE CONTRATO</th>
                        <th>REGION</th>
                        <th>SUELDO</th>
                        <th>VIGENCIA</th>
                        <th>FECHA DE POSTULACION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($postulaciones as $item): ?>
                        <tr>
                            <td>
                                <img src="<?= BASE_URL . '/public/' . $item['logo'] ?>" alt="Logo" style="height:30px; margin-right:8px;">
                                <?= htmlspecialchars($item['institucion']) ?>
                            </td>
                            <td><?= $item['tipo_contrato'] ?></td>
                            <td><?= $item['region'] ?></td>
                            <td><?= $item['sueldo'] ?></td>
                            <td><?= $item['vigencia'] ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($item['fecha_postulacion'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</section>
<?php $contenido = ob_get_clean();
require 'layout.php'; ?>