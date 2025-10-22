<?php
declare(strict_types=1);

namespace App\Controller;

class CursosController extends AppController
{
    public function index()
    {
        $cursos = $this->Cursos->find()
            ->contain(['Carreras'])
            ->all();
        $this->set(compact('cursos'));
    }

    public function add()
    {
        $curso = $this->Cursos->newEmptyEntity();
        if ($this->request->is('post')) {
            $curso = $this->Cursos->patchEntity($curso, $this->request->getData());
            if ($this->Cursos->save($curso)) {
                $this->Flash->success('Curso guardado.');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se pudo guardar el curso.');
        }
        $carreras = $this->Cursos->Carreras->find('list', ['keyField' => 'id_carrera', 'valueField' => 'nombre'])->toArray();
        $this->set(compact('curso', 'carreras'));
    }

    public function edit($id = null)
    {
        $curso = $this->Cursos->get($id);
        if ($this->request->is(['post', 'put', 'patch'])) {
            $curso = $this->Cursos->patchEntity($curso, $this->request->getData());
            if ($this->Cursos->save($curso)) {
                $this->Flash->success('Curso actualizado.');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se pudo actualizar.');
        }
        $carreras = $this->Cursos->Carreras->find('list', ['keyField' => 'id_carrera', 'valueField' => 'nombre'])->toArray();
        $this->set(compact('curso', 'carreras'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $curso = $this->Cursos->get($id);
        if ($this->Cursos->delete($curso)) {
            $this->Flash->success('Curso eliminado.');
        } else {
            $this->Flash->error('No se pudo eliminar.');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function view($id = null)
    {
        $curso = $this->Cursos->get($id, [
            'contain' => [
                'Carreras',
                'CursosAprobados' => ['Alumnos', 'Semestres', 'Secciones'],
            ],
        ]);
        $this->set(compact('curso'));
    }

}
