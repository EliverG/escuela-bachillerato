<div class="container mt-4">
    <h2>Reportes en PDF</h2>
    <p>Seleccione el reporte que desea descargar:</p>

    <div class="row mt-4">
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Alumnos por Carrera</h5>
                    <p class="card-text">Descargar un listado general de alumnos agrupados por carrera.</p>
                    <?= $this->Html->link(
                        '<i class="fa-solid fa-file-pdf me-2"></i>Descargar PDF',
                        ['controller' => 'Reporteria', 'action' => 'pdfAlumnosPorCarrera'],
                        ['class' => 'btn btn-danger', 'escape' => false, 'target' => '_blank']
                    ) ?>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Notas por Carrera, Curso y Sección</h5>
                    <p class="card-text">Descargar un listado de notas de alumnos por carrera, curso y sección.</p>
                    <?= $this->Html->link(
                        '<i class="fa-solid fa-file-pdf me-2"></i>Descargar PDF',
                        ['controller' => 'Reporteria', 'action' => 'pdfNotasPorCarreraCursoSeccion'],
                        ['class' => 'btn btn-danger', 'escape' => false, 'target' => '_blank']
                    ) ?>
                </div>
            </div>
        </div>
    </div>
</div>
