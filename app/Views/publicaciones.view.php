<?php ob_start(); ?>
<section class="contenedor-filtros">
    <h2>Investigaciones Docentes</h2>

    <form method="GET" class="filtros">

        <input type="text" name="docente" placeholder="Docente" value="<?= htmlspecialchars($_GET['docente'] ?? '') ?>">
        <input type="text" name="titulo" placeholder="Título" value="<?= htmlspecialchars($_GET['titulo'] ?? '') ?>">

        <select name="anio">
            <option value="">Todos los años</option>
            <?php foreach ($anios as $anio): ?>
                <option value="<?= $anio ?>" <?= (($_GET['anio'] ?? '') == $anio) ? 'selected' : '' ?>>
                    <?= $anio ?>
                </option>
            <?php endforeach; ?>
        </select>

        <select name="carrera">
            <option value="">Todas las carreras</option>
            <?php foreach ($carreras as $carrera): ?>
                <option value="<?= $carrera ?>" <?= (($_GET['carrera'] ?? '') == $carrera) ? 'selected' : '' ?>>
                    <?= $carrera ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit" class="btn-repositorio">Buscar</button>
    </form>
</section>

<section class="listado-publicaciones">
    <?php if (!empty($publicaciones)): ?>
        <?php foreach ($publicaciones as $pub): ?>
            <div class="publicacion">
                <div
                    class="etiqueta-carrera
                    <?= (stripos($pub['carrera'], 'educación') !== false) ? 'celeste' : ((stripos($pub['carrera'], 'ingeniería') !== false) ? 'guinda' : 'verde') ?>">
                    <?= htmlspecialchars($pub['carrera']) ?>
                </div>
                <h4><?= htmlspecialchars($pub['titulo']) ?></h4>
                <p><strong>Docente(s):</strong> <?= htmlspecialchars($pub['docente']) ?></p>
                <p><strong>Año:</strong> <?= htmlspecialchars($pub['anio']) ?></p>
                <a href="<?= htmlspecialchars($pub['enlace']) ?>" class="btn-repositorio" target="_blank">Ver en Repositorio</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p style="text-align:center; font-style:italic; color:#666;">No se encontraron publicaciones.</p>
    <?php endif; ?>
</section>
<?= $paginador->mostrar(); ?>
<?php $contenido = ob_get_clean();
require 'layout.php'; ?>