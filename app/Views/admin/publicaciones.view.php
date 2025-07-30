<?php ob_start(); ?>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Investigaciones Docentes</h3>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregar">Agregar</button>
    </div>
    <table class="table table-bordered table-hover bg-white tabla-investigaciones">
        <thead class="table-light">
            <tr>
                <th>TITULO</th>
                <th>DOCENTE</th>
                <th>AÑO</th>
                <th>CARRERA</th>
                <th>REPOSITORIO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($publicaciones as $pub): ?>
                <tr>
                    <td><?= htmlspecialchars($pub['titulo']) ?></td>
                    <td><?= htmlspecialchars($pub['docente']) ?></td>
                    <td><?= htmlspecialchars($pub['anio']) ?></td>
                    <td><?= htmlspecialchars($pub['carrera']) ?></td>
                    <td class="text-center"><a href="<?= htmlspecialchars($pub['enlace']) ?>" target="_blank" class="btn btn-sm btn-info"><i
                                class="fas fa-eye"></i>Ver</a></td>
                    <td>
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalEditar<?= $pub['id'] ?>"><i class="fas fa-pencil"></i></button>
                        <button class="btn btn-sm btn-danger btn-eliminar" data-id="<?= $pub['id'] ?>"><i
                                class="fas fa-trash"></i></button>
                    </td>
                </tr>

                <div class="modal fade" id="modalEditar<?= $pub['id'] ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="<?= BASE_URL ?>/admin/publicaciones/update" method="POST">
                                <input type="hidden" name="id" value="<?= $pub['id'] ?>">
                                <div class="modal-header">
                                    <h5 class="modal-title">Editar Publicación</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <input name="titulo" class="form-control mb-3" value="<?= $pub['titulo'] ?>"
                                        required>
                                    <input name="docente" class="form-control mb-3" value="<?= $pub['docente'] ?>"
                                        required>
                                    <input name="anio" type="number" class="form-control mb-3"
                                        value="<?= $pub['anio'] ?>" required>
                                    <input name="carrera" class="form-control mb-3" value="<?= $pub['carrera'] ?>"
                                        required>
                                    <input name="enlace" class="form-control mb-3" value="<?= $pub['enlace'] ?>"
                                        required>
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
            <form action="<?= BASE_URL ?>/admin/publicaciones" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Publicación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input name="titulo" class="form-control mb-3" placeholder="Título" required>
                    <input name="docente" class="form-control mb-3" placeholder="Docente" required>
                    <input name="anio" type="number" class="form-control mb-3" placeholder="Año" required>
                    <input name="carrera" class="form-control mb-3" placeholder="Carrera" required>
                    <input name="enlace" class="form-control mb-3" placeholder="URL del repositorio" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<form id="form-eliminar" method="POST" action="<?= BASE_URL ?>/admin/publicaciones/delete" style="display:none;">
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
                text: "La publicación será eliminada.",
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