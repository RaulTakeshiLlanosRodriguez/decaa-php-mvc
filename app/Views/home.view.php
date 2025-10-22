<?php ob_start(); ?>
<section class="noticias-destacadas">
    <h3>Últimas Publicaciones</h3>

    <div class="noticia">
        <img src="<?=BASE_URL?>/assets/foto2.jpg"
            alt="Comités de Calidad">
        <div class="contenido">
            <h4>Se conforman nuevos comités de calidad</h4>
            <p>Designación de equipos responsables de autoevaluación y mejora continua en todas las escuelas.</p>
            <a href="<?=BASE_URL?>/comites">Leer más</a>
        </div>
    </div>

    <div class="noticia">
        <img src="<?=BASE_URL?>/assets/foto1.jpg" alt="Capacitación docente">
        <div class="contenido">
            <h4>Capacitación docente sobre evaluación</h4>
            <p>Docentes participaron en taller institucional sobre estándares y buenas prácticas evaluativas.</p>
            <a href="#">Leer más</a>
        </div>
    </div>
</section>
<section class="indicadores">
    <h2>Avances en Educación con Calidad</h2>

    <div class="circles-container">
        <?php foreach ($indicadores as $indicador): ?>
            <div class="circle-box" data-target="<?= $indicador->cantidad ?>" data-color="#c65870">
                <svg>
                    <circle cx="70" cy="70" r="65"></circle>
                    <circle cx="70" cy="70" r="65" class="progress"></circle>
                </svg>
                <div class="number">0</div>
                <p><strong><?= htmlspecialchars($indicador->descripcion) ?></strong></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<?php $contenido = ob_get_clean();
require 'layout.php'; ?>