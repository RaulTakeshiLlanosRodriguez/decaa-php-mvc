<?php ob_start(); ?>
<section class="innovaciones-container">
    <h2>Publicaciones</h2>
    <div class="publicaciones-grid">
        <?php if (!empty($archivos)): ?>
            <?php foreach ($archivos as $archivo): ?>
                <div class="guia-card">
                    <img src="<?= BASE_URL . '/public/' . htmlspecialchars($archivo['ruta_archivo']) ?>" alt="Portada de la guía">
                    <div class="guia-body">
                        <?php if (!empty($archivo['enlace'])): ?>
                            <a href="<?= htmlspecialchars($archivo['enlace']) ?>" target="_blank">
                                <i class="fas fa-file-pdf"></i> <?= htmlspecialchars($archivo['descripcion']) ?>
                            </a>
                        <?php else: ?>
                            <p><?= htmlspecialchars($archivo['descripcion']) ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay publicaciones registradas.</p>
        <?php endif; ?>
    </div>
</section>
<?php $contenido = ob_get_clean();
require 'layout.php'; ?>