<?php ob_start(); ?>
<div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Miembros del Comité: <?= $comite['carrera'] ?></h3>
            <div>
                <a href="<?= BASE_URL ?>/admin/comites" class="btn btn-secondary me-2">Cancelar</a>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregar">Agregar</button>
            </div>
        </div>
        <table class="table table-bordered table-hover bg-white tabla-investigaciones">
            <thead class="table-light">
                <tr>
                    <th>ROL</th>
                    <th>INTEGRANTE</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($miembros as $miembro): ?>
                    <tr>
                        <td class="text-center"><?= htmlspecialchars($miembro['rol']) ?></td>
                        <td><?= htmlspecialchars($miembro['nombre']) ?></td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modalEditar<?= $miembro['id'] ?>"><i class="fas fa-pencil"></i></button>
                            <button class="btn btn-sm btn-danger btn-eliminar" data-id="<?= $miembro['id'] ?>"><i
                                    class="fas fa-trash"></i></button>
                        </td>
                    </tr>

                    <div class="modal fade" id="modalEditar<?= $miembro['id'] ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="<?= BASE_URL ?>/admin/miembros/update" method="POST">
                                    <input type="hidden" name="id" value="<?= $miembro['id'] ?>">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Editar Miembro</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input name="rol" class="form-control mb-3" value="<?= $miembro['rol'] ?>"
                                            required>
                                        <input name="nombre" class="form-control mb-3" value="<?= $miembro['nombre'] ?>"
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

        <!-- Paginación -->
        <?php $paginador->mostrar(); ?>
    </div>
<?php $contenido = ob_get_clean();
require 'dashboard.php'; ?>