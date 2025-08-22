<?php ob_start(); ?>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Innovaciones</h3>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregar">Agregar</button>
    </div>
    <table class="table table-bordered table-hover bg-white tabla-investigaciones">
        <thead class="table-light">
            <tr>
                <th>DESCRIPCIÓN</th>
                <th>VISTA PREVIA</th>
                <th>REPOSITORIO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($archivos as $archivo): ?>
                <tr>
                    <td><?= htmlspecialchars($archivo['descripcion']) ?></td>
                    <td class="text-center">
                        <?php if (!empty($archivo['ruta_archivo'])): ?>
                            <img src="<?= BASE_URL . '/public/' . htmlspecialchars($archivo['ruta_archivo']) ?>" alt="archivo" width="80">
                        <?php else: ?>
                            <em>Sin archivo</em>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <a href="<?= htmlspecialchars($archivo['enlace']) ?>" target="_blank" class="btn btn-info btn-sm">
                            <i class="fas fa-link"></i> Ver
                        </a>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalEditar<?= $archivo['id'] ?>"><i class="fas fa-pencil"></i></button>
                        <button class="btn btn-sm btn-danger btn-eliminar" data-id="<?= $archivo['id'] ?>"><i
                                class="fas fa-trash"></i></button>
                    </td>
                </tr>

                <div class="modal fade" id="modalEditar<?= $archivo['id'] ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="<?= BASE_URL ?>/admin/innovaciones/update" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $archivo['id'] ?>">
                                <div class="modal-header">
                                    <h5 class="modal-title">Editar Publicación</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <input name="descripcion" class="form-control mb-3" value="<?= $archivo['descripcion'] ?>" required>
                                    <input name="enlace" class="form-control mb-3" value="<?= $archivo['enlace'] ?>" required>
                                    <label for="archivo">Archivo nuevo (opcional)</label>
                                    <input type="file" name="archivo" class="form-control mb-3">
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

    <?= $paginador->mostrar(); ?>
</div>
<div class="modal fade" id="modalAgregar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= BASE_URL ?>/admin/innovaciones" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Publicación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input name="descripcion" class="form-control mb-3" placeholder="Descripción" required>
                    <input name="enlace" class="form-control mb-3" placeholder="URL de repositorio" required>
                    <label for="archivo">Subir archivo</label>
                    <input type="file" name="archivo" class="form-control mb-3" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<form id="form-eliminar" method="POST" action="<?= BASE_URL ?>/admin/innovaciones/delete" style="display:none;">
    <input type="hidden" name="id" id="eliminar-id">
</form>

<script>
    <?php if (!empty($_SESSION['mensaje'])): ?>
    Swal.fire({
        icon: '<?= $_SESSION['tipo'] ?? 'info' ?>',
        title: '<?= $_SESSION['mensaje'] ?>',
        showConfirmButton: false,
        timer: 1800
    });
    <?php unset($_SESSION['mensaje'], $_SESSION['tipo']); endif; ?>
    document.querySelectorAll('.btn-eliminar').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            Swal.fire({
                title: '¿Estás seguro?',
                text: "La innovación será eliminada.",
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
require 'dashboard.php'; ?>