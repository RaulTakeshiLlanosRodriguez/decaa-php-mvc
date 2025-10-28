<?php ob_start(); ?>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Mis Postulaciones</h3>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregar">Agregar</button>
    </div>
    
</div>
<?php $contenido = ob_get_clean();
require 'dashboardBolsaTrabajoEstudiante.php'; ?>