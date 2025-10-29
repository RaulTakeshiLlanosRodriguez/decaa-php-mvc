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
                            data-bs-target="#modalEditar<?= $convocatoria['id'] ?>"><i class="fas fa-pencil"></i></button>
                        <button class="btn btn-sm btn-danger btn-eliminar" data-id="<?= $convocatoria['id'] ?>"><i
                                class="fas fa-trash"></i></button>
                    </td>
                </tr>
                <div class="modal fade" id="modalEditar<?= $convocatoria['id'] ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="<?= BASE_URL ?>/bolsatrabajo/empresas/update" method="POST">
                                <input type="hidden" name="id" value="<?= $convocatoria['id'] ?>">
                                <div class="modal-header">
                                    <h5 class="modal-title">Editar Convocatoria</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Institución</label>
                                        <input type="text" name="institucion" class="form-control"
                                            value="<?= htmlspecialchars($convocatoria['institucion']) ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Plazas</label>
                                        <input type="number" name="plazas" class="form-control"
                                            value="<?= htmlspecialchars($convocatoria['plazas']) ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tipo de Contrato</label>
                                        <input type="text" name="tipo_contrato" class="form-control"
                                            value="<?= htmlspecialchars($convocatoria['tipo_contrato']) ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Vigencia</label>
                                        <input type="date" name="vigencia" class="form-control"
                                            value="<?= htmlspecialchars($convocatoria['vigencia']) ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Región</label>
                                        <select name="region_id" class="form-select" required>
                                            <?php foreach ($regiones as $region): ?>
                                                <option value="<?= $region['id'] ?>"
                                                    <?= ($region['nombre'] == $convocatoria['region']) ? 'selected' : '' ?>>
                                                    <?= $region['nombre'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class=" mb-3">
                                        <label class="form-label">Sueldo</label>
                                        <input type="text" name="sueldo" class="form-control"
                                            value="<?= htmlspecialchars($convocatoria['sueldo']) ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Logo</label>
                                        <input type="file" name="logo" class="form-control" accept=".jpg,.jpeg,.png,.webp,image/*">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="modal fade" id="modalAgregar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= BASE_URL ?>/bolsatrabajo/empresas" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Convocatoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Institución</label>
                        <input type="text" name="institucion" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Plazas</label>
                        <input type="number" name="plazas" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo de Contrato</label>
                        <input type="text" name="tipo_contrato" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Vigencia</label>
                        <input type="date" name="vigencia" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Región</label>
                        <select name="region_id" class="form-select" required>
                            <?php foreach ($regiones as $region): ?>
                                <option value="<?= $region['id'] ?>"><?= $region['nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sueldo</label>
                        <input type="text" name="sueldo" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Logo</label>
                        <input type="file" name="logo" class="form-control" accept=".jpg,.jpeg,.png,.webp,image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php if (!empty($_SESSION['mensaje'])): ?>
    <script>
        Swal.fire({
            icon: '<?= $_SESSION['tipo'] ?? 'info' ?>',
            title: '<?= $_SESSION['mensaje'] ?>',
            showConfirmButton: false,
            timer: 1800
        });
    </script>
<?php unset($_SESSION['mensaje'], $_SESSION['tipo']);
endif; ?>
<form id="form-eliminar" method="POST" action="<?= BASE_URL ?>/bolsatrabajo/empresas/delete" style="display:none;">
    <input type="hidden" name="id" id="eliminar-id">
</form>
<script>
    document.querySelectorAll('.btn-eliminar').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            Swal.fire({
                title: '¿Estás seguro?',
                text: "La convocatoria será eliminada.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('eliminar-id').value = id;
                    document.getElementById('form-eliminar').submit();
                }
            });
        });
    });
</script>
<?php $contenido = ob_get_clean();
require 'dashboardBolsaTrabajoEmpresa.php'; ?>