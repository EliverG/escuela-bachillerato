<div class="container mt-4 col-lg-8">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0"><i class="fa-solid fa-layer-group me-2"></i>Detalle de la Sección</h4>
        </div>

        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">ID</dt>
                <dd class="col-sm-9"><?= h($seccion->id_seccion) ?></dd>

                <dt class="col-sm-3">Nombre</dt>
                <dd class="col-sm-9"><?= h($seccion->nombre) ?></dd>

                <dt class="col-sm-3">Descripción</dt>
                <dd class="col-sm-9"><?= h($seccion->descripcion ?: 'Sin descripción') ?></dd>
            </dl>
        </div>

        <?php if (!empty($seccion->cursos_aprobados)) : ?>
            <div class="card-body border-top">
                <h5 class="mb-3"><i class="fa-solid fa-file-pen me-2"></i>Cursos Aprobados en esta Sección</h5>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered align-middle">
                        <thead class="table-secondary">
                            <tr>
                                <th>Alumno</th>
                                <th>Curso</th>
                                <th>Semestre</th>
                                <th>Nota</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($seccion->cursos_aprobados as $r): ?>
                                <tr>
                                    <td><?= h(($r->alumno->nombres ?? '') . ' ' . ($r->alumno->apellidos ?? '')) ?></td>
                                    <td><?= h($r->curso->nombre ?? '-') ?></td>
                                    <td><?= h($r->semestre->nombre ?? '-') ?></td>
                                    <td><?= h($r->nota) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php else: ?>
            <div class="card-body border-top">
                <p class="text-muted fst-italic mb-0">No hay registros de cursos aprobados para esta sección.</p>
            </div>
        <?php endif; ?>

        <div class="card-footer d-flex justify-content-between">
            <?= $this->Html->link('<i class="fa-solid fa-arrow-left"></i> Volver', ['action' => 'index'], ['class' => 'btn btn-secondary', 'escape' => false]) ?>
            <?= $this->Html->link('<i class="fa-solid fa-pen"></i> Editar', ['action' => 'edit', $seccion->id_seccion], ['class' => 'btn btn-primary', 'escape' => false]) ?>
        </div>
    </div>
</div>
