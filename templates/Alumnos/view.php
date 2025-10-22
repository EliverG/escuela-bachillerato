<div class="container mt-4 col-lg-8">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0"><i class="fa-solid fa-user-graduate me-2"></i>Detalle del Alumno</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <dl class="row">
                        <dt class="col-sm-4">ID</dt>
                        <dd class="col-sm-8"><?= h($alumno->id_alumno) ?></dd>

                        <dt class="col-sm-4">Nombre</dt>
                        <dd class="col-sm-8"><?= h($alumno->nombres . ' ' . $alumno->apellidos) ?></dd>

                        <dt class="col-sm-4">Carrera</dt>
                        <dd class="col-sm-8"><?= h($alumno->carrera->nombre ?? '-') ?></dd>

                        <dt class="col-sm-4">Fecha de Nacimiento</dt>
                        <dd class="col-sm-8"><?= h($alumno->fecha_nacimiento) ?></dd>

                        <dt class="col-sm-4">Fecha de Registro</dt>
                        <dd class="col-sm-8"><?= $alumno->fecha_registro->i18nFormat('dd/MM/yyyy HH:mm') ?></dd>
                    </dl>
                </div>

                <div class="col-md-4 text-center">
                    <?php if (!empty($alumno->fotografia)): ?>
                        <?= $this->Html->image($alumno->fotografia, [
                            'width' => '150',
                            'class' => 'rounded shadow mb-2',
                            'alt' => 'Foto de ' . h($alumno->nombres . ' ' . $alumno->apellidos)
                        ]) ?>
                    <?php else: ?>
                        <span class="text-muted fst-italic">Sin fotografía</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="card-body border-top">
            <h5 class="mb-3"><i class="fa-solid fa-file-pen me-2"></i>Cursos Aprobados</h5>
            <?php if (!empty($alumno->cursos_aprobados)): ?>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered align-middle">
                        <thead class="table-secondary">
                            <tr>
                                <th>Curso</th>
                                <th>Semestre</th>
                                <th>Sección</th>
                                <th>Nota</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($alumno->cursos_aprobados as $c): ?>
                                <tr>
                                    <td><?= h($c->curso->nombre ?? '-') ?></td>
                                    <td><?= h($c->semestre->nombre ?? '-') ?></td>
                                    <td><?= h($c->seccion->nombre ?? '-') ?></td>
                                    <td><?= h($c->nota) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="text-muted fst-italic">Este alumno no tiene cursos aprobados registrados.</p>
            <?php endif; ?>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <?= $this->Html->link('<i class="fa-solid fa-arrow-left"></i> Volver', ['action' => 'index'], ['class' => 'btn btn-secondary', 'escape' => false]) ?>
            <?= $this->Html->link('<i class="fa-solid fa-pen"></i> Editar', ['action' => 'edit', $alumno->id_alumno], ['class' => 'btn btn-primary', 'escape' => false]) ?>
        </div>
    </div>
</div>
