<div class="container-full mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Carreras</h2>
        <?= $this->Html->link(
            '<i class="fa-solid fa-plus"></i> Nueva Carrera', // Icono y texto
            ['action' => 'add'],
            ['class' => 'btn btn-success', 'escape' => false]
        ) ?>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carreras as $c): ?>
                    <tr>
                        <td><?= $c->id_carrera ?></td>
                        <td><?= h($c->nombre) ?></td>
                        <td><?= h($c->descripcion) ?></td>
                        <td class="text-center">
                            <?= $this->Html->link(
                                '<i class="fa-solid fa-pencil"></i>',
                                ['action' => 'edit', $c->id_carrera],
                                [
                                    'class' => 'btn btn-primary btn-sm',
                                    'data-bs-toggle' => 'tooltip', // Atributo de Bootstrap
                                    'title' => 'Editar', // El texto del tooltip va en 'title'
                                    'escape' => false
                                ]
                            ) ?>

                            <?= $this->Form->create(null, [
                                'url' => ['action' => 'delete', $c->id_carrera],
                                'class' => 'd-inline form-delete',
                                'onsubmit' => 'return false;' // evita submit automático
                            ]) ?>
                            <button type="submit" class="btn btn-danger btn-sm btn-delete" data-bs-toggle="tooltip"
                                title="Eliminar">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            <?= $this->Form->end() ?>



                            <?= $this->Html->link(
                                '<i class="fa-solid fa-eye"></i>',
                                ['action' => 'view', $c->id_carrera],
                                [
                                    'class' => 'btn btn-secondary btn-sm',
                                    'data-bs-toggle' => 'tooltip',
                                    'title' => 'Visualizar',
                                    'escape' => false
                                ]
                            ) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
