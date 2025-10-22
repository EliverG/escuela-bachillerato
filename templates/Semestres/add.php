<div class="container mt-4 col-lg-6">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0"><i class="fa-solid fa-plus me-2"></i>Nuevo Semestre</h4>
        </div>
        <div class="card-body">
            <?= $this->Form->create($semestre) ?>
            <div class="mb-3">
                <?= $this->Form->control('nombre', ['label' => 'Nombre del Semestre', 'class' => 'form-control', 'required' => true]) ?>
            </div>
            <div class="mb-3">
                <?= $this->Form->control('descripcion', ['label' => 'Descripción', 'class' => 'form-control', 'rows' => 3]) ?>
            </div>
            <div class="d-flex justify-content-between">
                <?= $this->Html->link('<i class="fa-solid fa-arrow-left"></i> Volver', ['action' => 'index'], ['class' => 'btn btn-secondary', 'escape' => false]) ?>
                <?= $this->Form->button('<i class="fa-solid fa-save"></i> Guardar', ['class' => 'btn btn-success', 'escapeTitle' => false]) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
