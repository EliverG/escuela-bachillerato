<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Notas / Cursos Aprobados</h2>
        <?= $this->Html->link('<i class="fa-solid fa-plus"></i> Nueva Nota', ['action' => 'add'], ['class' => 'btn btn-success', 'escape' => false]) ?>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Alumno</th>
                    <th>Curso</th>
                    <th>Semestre</th>
                    <th>Sección</th>
                    <th>Nota</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($cursosAprobados)): ?>
                    <?php foreach ($cursosAprobados as $n): ?>
                        <tr>
                            <td><?= $n->id_curso_aprobado ?></td>
                            <td><?= h(($n->alumno->nombres ?? '') . ' ' . ($n->alumno->apellidos ?? '')) ?></td>
                            <td><?= h($n->curso->nombre ?? '-') ?></td>
                            <td><?= h($n->semestre->nombre ?? '-') ?></td>
                            <td><?= h($n->seccion->nombre ?? '-') ?></td>
                            <td class="text-center"><?= h($n->nota) ?></td>
                            <td class="text-center">
                                <?= $this->Html->link('<i class="fa-solid fa-pencil"></i>', ['action' => 'edit', $n->id_curso_aprobado], ['class' => 'btn btn-primary btn-sm me-1', 'title' => 'Editar', 'data-bs-toggle' => 'tooltip', 'escape' => false]) ?>
                                <?= $this->Form->create(null, ['url' => ['action' => 'delete', $n->id_curso_aprobado], 'class' => 'd-inline form-delete', 'onsubmit' => 'return false;']) ?>
                                <button type="submit" class="btn btn-danger btn-sm btn-delete me-1" data-bs-toggle="tooltip" title="Eliminar">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <?= $this->Form->end() ?>
                                <?= $this->Html->link('<i class="fa-solid fa-eye"></i>', ['action' => 'view', $n->id_curso_aprobado], ['class' => 'btn btn-secondary btn-sm', 'title' => 'Ver detalles', 'data-bs-toggle' => 'tooltip', 'escape' => false]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="7" class="text-center text-muted py-3">No hay notas registradas.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
