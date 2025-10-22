<h2>Reporte de Notas por Carrera, Curso y Sección</h2>

<table border="1" cellspacing="0" cellpadding="5" width="100%">
    <thead>
        <tr>
            <th>Alumno</th>
            <th>Carrera</th>
            <th>Curso</th>
            <th>Sección</th>
            <th>Semestre</th>
            <th>Nota</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($notas as $n): ?>
            <tr>
                <td><?= h(($n->alumno->nombres ?? '') . ' ' . ($n->alumno->apellidos ?? '')) ?></td>
                <td><?= h($n->alumno->carrera->nombre ?? '-') ?></td>
                <td><?= h($n->curso->nombre ?? '-') ?></td>
                <td><?= h($n->seccion->nombre ?? '-') ?></td>
                <td><?= h($n->semestre->nombre ?? '-') ?></td>
                <td style="text-align:center;"><?= h($n->nota) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
