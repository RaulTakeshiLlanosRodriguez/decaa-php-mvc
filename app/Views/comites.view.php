<?php ob_start(); ?>
<section class="comites-container">
        <aside class="sidebar-comites">
            <ul>
                <li><a href="#" data-target="comites" class="active">Comités</a></li>
            </ul>
        </aside>
        <article class="contenido-comites">
            <div id="comites" class="contenido-comite-item active">
                <h2 class="titulo-comites">Comités de Calidad de Programas de Estudio</h2>
                <p>Designación de equipos responsables de autoevaluación y mejora continua en todas las escuelas.</p>
                <div id="comites-container">
                    <?php foreach ($comites as $comite): ?>
                        <h4 class="titulo-carrera"><?= strtoupper($comite['carrera']) ?></h4>
                        <table class="tabla-comite">
                            <?php foreach ($comite['miembros'] as $miembro): ?>
                                <tr>
                                    <td><?= htmlspecialchars($miembro['rol']) ?></td>
                                    <td><?= htmlspecialchars($miembro['nombre']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php endforeach; ?>
                </div>
            </div>
        </article>
    </section>
<?php $contenido = ob_get_clean();
require 'layout.php'; ?>