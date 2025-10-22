<div class="container mt-4 col-lg-8">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">
                <i class="fa-solid fa-file-pen me-2"></i>
                Detalle de Nota / Curso Aprobado
            </h4>
        </div>

        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">ID</dt>
                <dd class="col-sm-9"><?= h($cursoAprobado->id_curso_aprobado) ?></dd>

                <dt class="col-sm-3">Alumno</dt>
                <dd class="col-sm-9">
                    <?= h(($cursoAprobado->alumno->nombres ?? '') . ' ' . ($cursoAprobado->alumno->apellidos ?? '')) ?>
                </dd>

                <dt class="col-sm-3">Curso</dt>
                <dd class="col-sm-9"><?= h($cursoAprobado->curso->nombre ?? '-') ?></dd>

                <dt class="col-sm-3">Semestre</dt>
                <dd class="col-sm-9"><?= h($cursoAprobado->semestre->nombre ?? '-') ?></dd>

                <dt class="col-sm-3">Sección</dt>
                <dd class="col-sm-9"><?= h($cursoAprobado->seccion->nombre ?? '-') ?></dd>

                <dt class="col-sm-3">Nota</dt>
                <dd class="col-sm-9"><?= h($cursoAprobado->nota) ?></dd>

                <?php if (!empty($cursoAprobado->fecha_registro)) : ?>
                    <dt class="col-sm-3">Fecha de Registro</dt>
                    <dd class="col-sm-9">
                        <?= $cursoAprobado->fecha_registro instanceof \Cake\I18n\FrozenTime
                            ? $cursoAprobado->fecha_registro->i18nFormat('dd/MM/yyyy HH:mm')
                            : h($cursoAprobado->fecha_registro) ?>
                    </dd>
                <?php endif; ?>
            </dl>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <?= $this->Html->link(
                '<i class="fa-solid fa-arrow-left"></i> Volver',
                ['action' => 'index'],
                ['class' => 'btn btn-secondary', 'escape' => false]
            ) ?>

            <?= $this->Html->link(
                '<i class="fa-solid fa-pen"></i> Editar',
                ['action' => 'edit', $cursoAprobado->id_curso_aprobado],
                ['class' => 'btn btn-primary', 'escape' => false]
            ) ?>
        </div>
    </div>
</div>
