<div class="container mt-4 col-lg-8">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0"><i class="fa-solid fa-briefcase me-2"></i>Detalle de Carrera</h4>
        </div>

        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">ID</dt>
                <dd class="col-sm-9"><?= h($carrera->id_carrera) ?></dd>

                <dt class="col-sm-3">Nombre</dt>
                <dd class="col-sm-9"><?= h($carrera->nombre) ?></dd>

                <dt class="col-sm-3">Descripción</dt>
                <dd class="col-sm-9"><?= h($carrera->descripcion ?: 'Sin descripción') ?></dd>
            </dl>
        </div>

        <?php if (!empty($carrera->alumnos)): ?>
            <div class="card-body border-top">
                <h5 class="mb-3"><i class="fa-solid fa-users me-2"></i>Alumnos de esta carrera</h5>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered align-middle">
                        <thead class="table-secondary">
                            <tr>
                                <th>ID</th>
                                <th>Nombre Completo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($carrera->alumnos as $al): ?>
                                <tr>
                                    <td><?= $al->id_alumno ?></td>
                                    <td><?= h($al->nombres . ' ' . $al->apellidos) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>

        <div class="card-footer d-flex justify-content-between">
            <?= $this->Html->link('<i class="fa-solid fa-arrow-left"></i> Volver',
                ['action' => 'index'],
                ['class' => 'btn btn-secondary', 'escape' => false]) ?>
            <?= $this->Html->link('<i class="fa-solid fa-pen"></i> Editar',
                ['action' => 'edit', $carrera->id_carrera],
                ['class' => 'btn btn-primary', 'escape' => false]) ?>
        </div>
    </div>
</div>
