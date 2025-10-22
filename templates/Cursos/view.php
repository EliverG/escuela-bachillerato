<div class="container mt-4 col-lg-8">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0"><i class="fa-solid fa-book me-2"></i>Detalle del Curso</h4>
        </div>

        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">ID</dt>
                <dd class="col-sm-9"><?= h($curso->id_curso) ?></dd>

                <dt class="col-sm-3">Nombre</dt>
                <dd class="col-sm-9"><?= h($curso->nombre) ?></dd>

                <dt class="col-sm-3">Carrera</dt>
                <dd class="col-sm-9"><?= h($curso->carrera->nombre ?? '-') ?></dd>

                <dt class="col-sm-3">Créditos</dt>
                <dd class="col-sm-9"><?= h($curso->creditos ?: 'No definido') ?></dd>

                <dt class="col-sm-3">Descripción</dt>
                <dd class="col-sm-9"><?= h($curso->descripcion ?: 'Sin descripción') ?></dd>
            </dl>
        </div>

        <?php if (!empty($curso->cursos_aprobados)): ?>
            <div class="card-body border-top">
                <h5 class="mb-3"><i class="fa-solid fa-user-graduate me-2"></i>Alumnos inscritos</h5>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered align-middle">
                        <thead class="table-secondary">
                            <tr>
                                <th>Alumno</th>
                                <th>Semestre</th>
                                <th>Sección</th>
                                <th>Nota</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($curso->cursos_aprobados as $r): ?>
                                <tr>
                                    <td><?= h(($r->alumno->nombres ?? '') . ' ' . ($r->alumno->apellidos ?? '')) ?></td>
                                    <td><?= h($r->semestre->nombre ?? '-') ?></td>
                                    <td><?= h($r->seccion->nombre ?? '-') ?></td>
                                    <td><?= h($r->nota) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>

        <div class="card-footer d-flex justify-content-between">
            <?= $this->Html->link('<i class="fa-solid fa-arrow-left"></i> Volver', ['action' => 'index'], ['class' => 'btn btn-secondary', 'escape' => false]) ?>
            <?= $this->Html->link('<i class="fa-solid fa-pen"></i> Editar', ['action' => 'edit', $curso->id_curso], ['class' => 'btn btn-primary', 'escape' => false]) ?>
        </div>
    </div>
</div>
