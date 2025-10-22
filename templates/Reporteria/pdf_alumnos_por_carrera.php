<h2>Reporte de Alumnos por Carrera</h2>

<?php foreach ($reporte as $carrera => $alumnos): ?>
    <h4><?= h($carrera) ?></h4>
    <table border="1" cellspacing="0" cellpadding="5" width="100%">
        <thead>
            <tr>
                <th style="width: 8%;">ID</th>
                <th style="width: 32%;">Nombre</th>
                <th style="width: 32%;">Apellido</th>
                <th style="width: 28%;">Fecha Nacimiento</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alumnos as $a): ?>
                <tr>
                    <td><?= h($a->id_alumno) ?></td>
                    <td><?= h($a->nombres) ?></td>
                    <td><?= h($a->apellidos) ?></td>
                    <td><?= $a->fecha_nacimiento ? $a->fecha_nacimiento->i18nFormat('dd/MM/yyyy') : '-' ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
<?php endforeach; ?>
