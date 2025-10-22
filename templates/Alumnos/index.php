<div class="container mt-4">

    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
        <h2 class="mb-0">Alumnos</h2>

        <div class="ms-auto">
            <?= $this->Html->link(
                '<i class="fa-solid fa-plus"></i> Nuevo Alumno',
                ['action' => 'add'],
                ['class' => 'btn btn-success', 'escape' => false]
            ) ?>
        </div>
    </div>

    <!-- Filtros -->
    <div class="card border-0 shadow-sm mb-3">
        <div class="card-body">
            <?= $this->Form->create(null, ['type' => 'get', 'class' => 'row g-2 align-items-end']) ?>

            <div class="col-md-4">
                <?= $this->Form->control('q', [
                    'label' => 'Buscar alumno (nombre o apellido)',
                    'value' => $q ?? '',
                    'class' => 'form-control',
                    'placeholder' => 'Ej: Ana, Ramírez...'
                ]) ?>
            </div>

            <div class="col-md-4">
                <?= $this->Form->control('carrera_id', [
                    'label' => 'Filtrar por carrera',
                    'options' => $carreras,
                    'empty' => 'Todas',
                    'value' => $carreraId ?? '',
                    'class' => 'form-select'
                ]) ?>
            </div>

            <div class="col-md-4 d-flex gap-2">
                <?= $this->Form->button('<i class="fa-solid fa-filter"></i> Filtrar', [
                    'class' => 'btn btn-primary',
                    'escapeTitle' => false
                ]) ?>
                <?= $this->Html->link('<i class="fa-solid fa-rotate"></i> Limpiar', ['action' => 'index'], [
                    'class' => 'btn btn-outline-secondary',
                    'escape' => false
                ]) ?>
            </div>

            <?= $this->Form->end() ?>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Alumno</th>
                    <th>Carrera</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($alumnos) === 0): ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            No se encontraron alumnos con los filtros seleccionados.
                        </td>
                    </tr>
                <?php else: ?>
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
                                <?= $this->Html->link('<i class="fa-solid fa-eye"></i>', ['action' => 'view', $a->id_alumno], [
                                    'class' => 'btn btn-secondary btn-sm me-1',
                                    'title' => 'Ver',
                                    'data-bs-toggle' => 'tooltip',
                                    'escape' => false
                                ]) ?>
                                <?= $this->Html->link('<i class="fa-solid fa-pencil"></i>', ['action' => 'edit', $a->id_alumno], [
                                    'class' => 'btn btn-primary btn-sm me-1',
                                    'title' => 'Editar',
                                    'data-bs-toggle' => 'tooltip',
                                    'escape' => false
                                ]) ?>
                                <?= $this->Form->create(null, [
                                    'url' => ['action' => 'delete', $a->id_alumno],
                                    'class' => 'd-inline form-delete',
                                    'onsubmit' => 'return false;'
                                ]) ?>
                                <button type="submit" class="btn btn-danger btn-sm btn-delete" title="Eliminar"
                                    data-bs-toggle="tooltip">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <?= $this->Form->end() ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

        <?php if ($this->Paginator->hasPrev() || $this->Paginator->hasNext()): ?>
            <nav aria-label="Paginación" class="d-flex justify-content-between align-items-center">
                <div class="text-muted small">
                    <?= $this->Paginator->counter('{{start}}–{{end}} de {{count}} registros') ?>
                </div>

                <ul class="pagination mb-0">
                    <?= $this->Paginator->first('<i class="fa-solid fa-angles-left"></i>', ['escape' => false]) ?>
                    <?= $this->Paginator->prev('<i class="fa-solid fa-angle-left"></i>', ['escape' => false]) ?>
                    <?= $this->Paginator->numbers(['modulus' => 2]) ?>
                    <?= $this->Paginator->next('<i class="fa-solid fa-angle-right"></i>', ['escape' => false]) ?>
                    <?= $this->Paginator->last('<i class="fa-solid fa-angles-right"></i>', ['escape' => false]) ?>
                </ul>
            </nav>
        <?php endif; ?>

    </div>
</div>
