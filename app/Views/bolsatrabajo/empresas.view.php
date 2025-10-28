<?php ob_start(); ?>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Mis Convocatorias</h3>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregar">Agregar</button>
    </div>
    <table class="table table-bordered table-hover bg-white tabla-investigaciones">
        <thead class="table-light">
            <tr>
                <th>INSTITUCION</th>
                <th>PLAZAS</th>
                <th>CONTRATO</th>
                <th>VIGENCIA</th>
                <th>REGION</th>
                <th>SUELDO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($convocatorias as $convocatoria): ?>
                <tr>
                    <td><?= htmlspecialchars($convocatoria['institucion']) ?></td>
                    <td><?= htmlspecialchars($convocatoria['plazas']) ?></td>
                    <td><?= htmlspecialchars($convocatoria['tipo_contrato']) ?></td>
                    <td><?= htmlspecialchars($convocatoria['vigencia']) ?></td>
                    <td><?= htmlspecialchars($convocatoria['region']) ?></td>
                    <td><?= htmlspecialchars($convocatoria['sueldo']) ?></td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalEditar<?= $indicador['id'] ?>"><i class="fas fa-pencil"></i></button>
                        <button class="btn btn-sm btn-danger btn-eliminar" data-id="<?= $indicador['id'] ?>"><i
                                class="fas fa-trash"></i></button>
                    </td>
                </tr>

                
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php $contenido = ob_get_clean();
require 'dashboardBolsaTrabajoEmpresa.php'; ?>