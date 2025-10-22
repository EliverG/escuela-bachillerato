<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;
use Cake\View\View;
use Mpdf\Mpdf;

class ReporteriaController extends AppController
{
    private $Alumnos;
    private $CursosAprobados;
    private $Carreras;
    private $Cursos;
    private $Secciones;
    private $Semestres;

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        // Inicializamos los modelos
        $this->Alumnos        = $this->getTableLocator()->get('Alumnos');
        $this->CursosAprobados= $this->getTableLocator()->get('CursosAprobados');
        $this->Carreras       = $this->getTableLocator()->get('Carreras');
        $this->Cursos         = $this->getTableLocator()->get('Cursos');
        $this->Secciones      = $this->getTableLocator()->get('Secciones');
        $this->Semestres      = $this->getTableLocator()->get('Semestres');
    }

    // Vista principal con tarjetas/botones
    public function index()
    {
        // Solo renderiza templates/Reporteria/index.php
    }

    public function pdfAlumnosPorCarrera()
    {
        // 1) Datos
        $alumnos = $this->Alumnos->find('all', [
            'contain' => ['Carreras'],
            'order'   => ['Carreras.nombre' => 'ASC', 'Alumnos.apellidos' => 'ASC']
        ])->all();

        // 2) Agrupar por carrera
        $reporte = [];
        foreach ($alumnos as $alumno) {
            $carrera = $alumno->carrera->nombre ?? 'Sin Carrera';
            $reporte[$carrera][] = $alumno;
        }

        // 3) Renderizar la vista a HTML (string)
        $view = new View();
        $view->disableAutoLayout();
        $view->setTemplatePath('Reporteria');
        $view->setTemplate('pdf_alumnos_por_carrera');
        $view->set(compact('reporte'));
        $html = $view->render();

        // 4) Crear PDF en memoria y devolver Response Cake
        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);
        $pdfContent = $mpdf->Output('', 'S'); // S = string

        return $this->response
            ->withType('pdf')
            ->withStringBody($pdfContent)
            ->withDownload('alumnos_por_carrera.pdf');
    }

    public function pdfNotasPorCarreraCursoSeccion()
    {
        // 1) Datos (necesitamos Carrera desde Alumno)
        $notas = $this->CursosAprobados->find('all', [
            'contain' => [
                'Alumnos' => ['Carreras'],
                'Cursos',
                'Secciones',
                'Semestres'
            ],
            'order' => [
                'Cursos.nombre'   => 'ASC',
                'Secciones.nombre'=> 'ASC',
                'Alumnos.apellidos'=> 'ASC'
            ]
        ])->all();

        // 2) Renderizar la vista a HTML (string)
        $view = new View();
        $view->disableAutoLayout();
        $view->setTemplatePath('Reporteria');
        $view->setTemplate('pdf_notas_por_carrera_curso_seccion');
        $view->set(compact('notas'));
        $html = $view->render();

        // 3) Crear PDF en memoria y devolver Response Cake
        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);
        $pdfContent = $mpdf->Output('', 'S'); // S = string

        return $this->response
            ->withType('pdf')
            ->withStringBody($pdfContent)
            ->withDownload('notas_por_carrera_curso_seccion.pdf');
    }
}
