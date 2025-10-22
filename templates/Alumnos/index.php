<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Alumnos</h2>
        <?= $this->Html->link(
            '<i class="fa-solid fa-plus"></i> Nuevo Alumno',
            ['action' => 'add'],
            ['class' => 'btn btn-success', 'escape' => false]
        ) ?>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Nombre Completo</th>
                    <th>Carrera</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alumnos as $a): ?>
                    <tr>
                        <td class="text-center"><?= $a->id_alumno ?></td>
                        <td class="text-center">
                            <?php if (!empty($a->fotografia)): ?>
                                <?= $this->Html->image($a->fotografia, [
                                    'width' => '50',
                                    'class' => 'rounded-circle shadow-sm'
                                ]) ?>
                            <?php else: ?>
                                <span class="text-muted">Sin foto</span>
                            <?php endif; ?>
                        </td>
                        <td><?= h($a->nombres . ' ' . $a->apellidos) ?></td>
                        <td><?= h($a->carrera->nombre ?? '-') ?></td>
                        <td class="text-center">
                            <?= $this->Html->link('<i class="fa-solid fa-eye"></i>', ['action' => 'view', $a->id_alumno],
                                ['class' => 'btn btn-secondary btn-sm me-1', 'title' => 'Ver', 'data-bs-toggle' => 'tooltip', 'escape' => false]) ?>
                            <?= $this->Html->link('<i class="fa-solid fa-pencil"></i>', ['action' => 'edit', $a->id_alumno],
                                ['class' => 'btn btn-primary btn-sm me-1', 'title' => 'Editar', 'data-bs-toggle' => 'tooltip', 'escape' => false]) ?>
                            <?= $this->Form->create(null, ['url' => ['action' => 'delete', $a->id_alumno], 'class' => 'd-inline form-delete', 'onsubmit' => 'return false;']) ?>
                            <button type="submit" class="btn btn-danger btn-sm btn-delete" title="Eliminar" data-bs-toggle="tooltip">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            <?= $this->Form->end() ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
