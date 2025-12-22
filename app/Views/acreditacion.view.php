<?php ob_start(); ?>
<section class="acreditacion">

    <h2>Acreditación</h2>

    <p>
        La acreditación es un proceso de evaluación externa que permite garantizar la calidad
        de los programas académicos, verificando el cumplimiento de estándares establecidos
        por los organismos competentes en materia de educación superior.
    </p>

    <h3>Objetivo</h3>
    <p>
        Asegurar que los programas de estudios cumplan con los estándares de calidad académica,
        promoviendo la mejora continua de los procesos de enseñanza, investigación, gestión y
        responsabilidad social universitaria.
    </p>

    <h3>Importancia de la acreditación</h3>
    <ul>
        <li>Garantiza la calidad del servicio educativo.</li>
        <li>Fortalece la confianza de la comunidad universitaria y la sociedad.</li>
        <li>Promueve la mejora continua de los programas académicos.</li>
        <li>Permite evidenciar el cumplimiento de estándares nacionales.</li>
    </ul>

    <h3>Procesos de acreditación</h3>
    <p>
        Los procesos de acreditación comprenden etapas de autoevaluación, evaluación externa
        y seguimiento, orientadas a identificar fortalezas, oportunidades de mejora y acciones
        de sostenibilidad académica.
    </p>

    <h3>Estado de los programas</h3>
    <p>
        La Dirección de Evaluación de la Calidad Académica y Acreditación realiza el seguimiento
        permanente del estado de los programas académicos, consolidando evidencias y promoviendo
        acciones de mejora conforme a los estándares vigentes.
    </p>

</section>
<?php $contenido = ob_get_clean();
require 'layout.php'; ?>