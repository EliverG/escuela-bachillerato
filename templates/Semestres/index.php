<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Semestres</h2>
        <?= $this->Html->link('<i class="fa-solid fa-plus"></i> Nuevo Semestre', ['action' => 'add'], ['class' => 'btn btn-success', 'escape' => false]) ?>
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
                <?php if (!empty($semestres)): ?>
                    <?php foreach ($semestres as $s): ?>
                        <tr>
                            <td class="text-center"><?= $s->id_semestre ?></td>
                            <td><?= h($s->nombre) ?></td>
                            <td><?= h($s->descripcion ?: '-') ?></td>
                            <td class="text-center">
                                <?= $this->Html->link('<i class="fa-solid fa-pencil"></i>', ['action' => 'edit', $s->id_semestre], ['class' => 'btn btn-primary btn-sm me-1', 'data-bs-toggle' => 'tooltip', 'title' => 'Editar', 'escape' => false]) ?>
                                <?= $this->Form->create(null, ['url' => ['action' => 'delete', $s->id_semestre], 'class' => 'd-inline form-delete', 'onsubmit' => 'return false;']) ?>
                                <button type="submit" class="btn btn-danger btn-sm btn-delete me-1" data-bs-toggle="tooltip" title="Eliminar">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <?= $this->Form->end() ?>
                                <?= $this->Html->link('<i class="fa-solid fa-eye"></i>', ['action' => 'view', $s->id_semestre], ['class' => 'btn btn-secondary btn-sm', 'data-bs-toggle' => 'tooltip', 'title' => 'Ver', 'escape' => false]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="4" class="text-center text-muted py-3">No hay semestres registrados.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
