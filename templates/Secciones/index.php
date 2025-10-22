<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Secciones</h2>
        <?= $this->Html->link(
            '<i class="fa-solid fa-plus"></i> Nueva Sección',
            ['action' => 'add'],
            ['class' => 'btn btn-success', 'escape' => false]
        ) ?>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($secciones)): ?>
                    <?php foreach ($secciones as $s): ?>
                        <tr>
                            <td class="text-center"><?= $s->id_seccion ?></td>
                            <td><?= h($s->nombre) ?></td>
                            <td><?= h($s->descripcion ?: '-') ?></td>
                            <td class="col-2 text-center">
                                <?= $this->Html->link(
                                    '<i class="fa-solid fa-pencil"></i>',
                                    ['action' => 'edit', $s->id_seccion],
                                    ['class' => 'btn btn-primary btn-sm me-1', 'title' => 'Editar', 'data-bs-toggle' => 'tooltip', 'escape' => false]
                                ) ?>

                                <?= $this->Form->create(null, [
                                    'url' => ['action' => 'delete', $s->id_seccion],
                                    'class' => 'd-inline form-delete',
                                    'onsubmit' => 'return false;'
                                ]) ?>
                                <button type="submit" class="btn btn-danger btn-sm btn-delete me-1"
                                    data-bs-toggle="tooltip" title="Eliminar">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <?= $this->Form->end() ?>

                                <?= $this->Html->link(
                                    '<i class="fa-solid fa-eye"></i>',
                                    ['action' => 'view', $s->id_seccion],
                                    ['class' => 'btn btn-secondary btn-sm', 'title' => 'Ver detalles', 'data-bs-toggle' => 'tooltip', 'escape' => false]
                                ) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center text-muted py-3">No hay secciones registradas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
