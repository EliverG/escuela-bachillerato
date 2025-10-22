<div class="container mt-4 col-lg-8">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="fa-solid fa-pen-to-square me-2"></i>Editar Nota / Curso Aprobado</h4>
        </div>
        <div class="card-body">
            <?= $this->Form->create($cursoAprobado) ?>

            <div class="row mb-3">
                <div class="col-md-6">
                    <?= $this->Form->control('id_alumno', ['label' => 'Alumno', 'options' => $alumnos, 'class' => 'form-select']) ?>
                </div>
                <div class="col-md-6">
                    <?= $this->Form->control('id_curso', ['label' => 'Curso', 'options' => $cursos, 'class' => 'form-select']) ?>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <?= $this->Form->control('id_semestre', ['label' => 'Semestre', 'options' => $semestres, 'class' => 'form-select']) ?>
                </div>
                <div class="col-md-6">
                    <?= $this->Form->control('id_seccion', ['label' => 'Sección', 'options' => $secciones, 'class' => 'form-select']) ?>
                </div>
            </div>

            <div class="mb-3">
                <?= $this->Form->control('nota', ['label' => 'Nota', 'class' => 'form-control', 'type' => 'number', 'min' => 0, 'max' => 100]) ?>
            </div>

            <div class="d-flex justify-content-between">
                <?= $this->Html->link('<i class="fa-solid fa-arrow-left"></i> Volver', ['action' => 'index'], ['class' => 'btn btn-secondary', 'escape' => false]) ?>
                <?= $this->Form->button('<i class="fa-solid fa-save"></i> Actualizar', ['class' => 'btn btn-primary', 'escapeTitle' => false]) ?>
            </div>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
