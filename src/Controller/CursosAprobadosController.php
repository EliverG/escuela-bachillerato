<?php
declare(strict_types=1);

namespace App\Controller;

class CursosAprobadosController extends AppController
{
    public function index()
    {
        $cursosAprobados = $this->CursosAprobados->find()
            ->contain(['Alumnos', 'Cursos', 'Semestres', 'Secciones'])
            ->order(['CursosAprobados.id_curso_aprobado' => 'DESC'])
            ->all();

        $this->set(compact('cursosAprobados'));
    }

    public function add()
    {
        $cursoAprobado = $this->CursosAprobados->newEmptyEntity();
        if ($this->request->is('post')) {
            $cursoAprobado = $this->CursosAprobados->patchEntity($cursoAprobado, $this->request->getData());
            if ($this->CursosAprobados->save($cursoAprobado)) {
                $this->Flash->success('Registro guardado correctamente.');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se pudo guardar el registro.');
        }

        $alumnos = $this->CursosAprobados->Alumnos->find('list', [
            'keyField' => 'id_alumno',
            'valueField' => function ($row) {
                return $row['nombres'] . ' ' . $row['apellidos'];
            }
        ])->toArray();
        $cursos = $this->CursosAprobados->Cursos->find('list', ['keyField' => 'id_curso', 'valueField' => 'nombre'])->toArray();
        $semestres = $this->CursosAprobados->Semestres->find('list', ['keyField' => 'id_semestre', 'valueField' => 'nombre'])->toArray();
        $secciones = $this->CursosAprobados->Secciones->find('list', ['keyField' => 'id_seccion', 'valueField' => 'nombre'])->toArray();

        $this->set(compact('cursoAprobado', 'alumnos', 'cursos', 'semestres', 'secciones'));
    }
     public function edit($id = null)
    {
        $cursoAprobado = $this->CursosAprobados->get($id);
        if ($this->request->is(['post', 'put', 'patch'])) {
            $cursoAprobado = $this->CursosAprobados->patchEntity($cursoAprobado, $this->request->getData());
            if ($this->CursosAprobados->save($cursoAprobado)) {
                $this->Flash->success('Nota curso actualizado.');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se pudo actualizar.');
        }
                $alumnos = $this->CursosAprobados->Alumnos->find('list', [
            'keyField' => 'id_alumno',
            'valueField' => function ($row) {
                return $row['nombres'] . ' ' . $row['apellidos'];
            }
        ])->toArray();
        $cursos = $this->CursosAprobados->Cursos->find('list', ['keyField' => 'id_curso', 'valueField' => 'nombre'])->toArray();
        $semestres = $this->CursosAprobados->Semestres->find('list', ['keyField' => 'id_semestre', 'valueField' => 'nombre'])->toArray();
        $secciones = $this->CursosAprobados->Secciones->find('list', ['keyField' => 'id_seccion', 'valueField' => 'nombre'])->toArray();
        $this->set(compact('cursoAprobado', 'alumnos', 'cursos', 'semestres', 'secciones'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $registro = $this->CursosAprobados->get($id);
        if ($this->CursosAprobados->delete($registro)) {
            $this->Flash->success('Registro eliminado.');
        } else {
            $this->Flash->error('No se pudo eliminar.');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function view($id = null)
    {
        $cursoAprobado = $this->CursosAprobados->get($id, [
            'contain' => ['Alumnos', 'Cursos', 'Semestres', 'Secciones'],
        ]);
        $this->set(compact('cursoAprobado'));
    }

}
