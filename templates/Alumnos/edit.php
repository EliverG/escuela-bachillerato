<div class="container mt-4 col-lg-6">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="fa-solid fa-user-pen me-2"></i>Editar Alumno</h4>
        </div>
        <div class="card-body">
            <?= $this->Form->create($alumno, ['type' => 'file']) ?>

            <?= $this->Form->control('nombres', ['label' => 'Nombres', 'class' => 'form-control mb-3']) ?>
            <?= $this->Form->control('apellidos', ['label' => 'Apellidos', 'class' => 'form-control mb-3']) ?>
            <?= $this->Form->control('fecha_nacimiento', ['label' => 'Fecha de Nacimiento', 'type' => 'date', 'class' => 'form-control mb-3']) ?>
            <?= $this->Form->control('id_carrera', ['label' => 'Carrera', 'options' => $carreras, 'class' => 'form-select mb-3']) ?>

            <label class="form-label">Fotografía actual</label><br>
            <?php if (!empty($alumno->fotografia)): ?>
                <?= $this->Html->image($alumno->fotografia, ['width' => '100', 'class' => 'rounded shadow-sm mb-2']) ?>
            <?php else: ?>
                <p class="text-muted fst-italic">No hay imagen registrada</p>
            <?php endif; ?>

            <?= $this->Form->control('fotografia', ['label' => 'Nueva Fotografía', 'type' => 'file', 'class' => 'form-control mb-3']) ?>

            <div class="d-flex justify-content-between">
                <?= $this->Html->link('<i class="fa-solid fa-arrow-left"></i> Volver', ['action' => 'index'], ['class' => 'btn btn-secondary', 'escape' => false]) ?>
                <?= $this->Form->button('<i class="fa-solid fa-save"></i> Actualizar', ['class' => 'btn btn-primary', 'escapeTitle' => false]) ?>
            </div>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
