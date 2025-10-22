<div class="container mt-4 col-lg-6">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0"><i class="fa-solid fa-user-plus me-2"></i>Nuevo Alumno</h4>
        </div>
        <div class="card-body">
            <?= $this->Form->create($alumno, ['type' => 'file']) ?>

            <?= $this->Form->control('nombres', ['label' => 'Nombres', 'class' => 'form-control mb-3']) ?>
            <?= $this->Form->control('apellidos', ['label' => 'Apellidos', 'class' => 'form-control mb-3']) ?>
            <?= $this->Form->control('fecha_nacimiento', ['label' => 'Fecha de Nacimiento', 'type' => 'date', 'class' => 'form-control mb-3']) ?>
            <?= $this->Form->control('id_carrera', ['label' => 'Carrera', 'options' => $carreras, 'class' => 'form-select mb-3', 'empty' => 'Seleccione una carrera']) ?>
            <?= $this->Form->control('fotografia', ['label' => 'Fotografía', 'type' => 'file', 'class' => 'form-control mb-3']) ?>

            <div class="d-flex justify-content-between">
                <?= $this->Html->link('<i class="fa-solid fa-arrow-left"></i> Volver', ['action' => 'index'], ['class' => 'btn btn-secondary', 'escape' => false]) ?>
                <?= $this->Form->button('<i class="fa-solid fa-save"></i> Guardar', ['class' => 'btn btn-success', 'escapeTitle' => false]) ?>
            </div>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
