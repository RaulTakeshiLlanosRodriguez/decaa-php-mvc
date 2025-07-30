<?php ob_start(); ?>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Indicadores</h3>
        <div>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregar">Agregar</button>
        </div>
    </div>
    <table class="table table-bordered table-hover bg-white tabla-investigaciones">
        <thead class="table-light">
            <tr>
                <th>DESCRIPCION</th>
                <th>CANTIDAD</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($indicadores as $indicador): ?>
                <tr>
                    <td><?= htmlspecialchars($indicador['descripcion']) ?></td>
                    <td class="text-center"><?= htmlspecialchars($indicador['cantidad']) ?></td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalEditar<?= $indicador['id'] ?>"><i class="fas fa-pencil"></i></button>
                        <button class="btn btn-sm btn-danger btn-eliminar" data-id="<?= $indicador['id'] ?>"><i
                                class="fas fa-trash"></i></button>
                    </td>
                </tr>

                <div class="modal fade" id="modalEditar<?= $indicador['id'] ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="<?= BASE_URL ?>/admin/indicadores/update" method="POST">
                                <input type="hidden" name="id" value="<?= $indicador['id'] ?>">
                                <div class="modal-header">
                                    <h5 class="modal-title">Editar Indicador</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <input name="descripcion" class="form-control mb-3"
                                        value="<?= $indicador['descripcion'] ?>" required>
                                    <input name="cantidad" type="number" min="0" class="form-control mb-3"
                                        value="<?= $indicador['cantidad'] ?>" required>
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

    <!-- Paginación -->
    <?= $paginador->mostrar(); ?>
</div>
<div class="modal fade" id="modalAgregar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= BASE_URL ?>/admin/indicadores" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Indicador</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input name="descripcion" class="form-control mb-3" placeholder="Descripcion" required>
                    <input name="cantidad" type="number" min="0" class="form-control mb-3"
                        placeholder="Cantidad" required>
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
<form id="form-eliminar" method="POST" action="<?= BASE_URL ?>/admin/indicadores/delete" style="display:none;">
    <input type="hidden" name="id" id="eliminar-id">
</form>
<script>
    document.querySelectorAll('.btn-eliminar').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            Swal.fire({
                title: '¿Estás seguro?',
                text: "El indicador será eliminado.",
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