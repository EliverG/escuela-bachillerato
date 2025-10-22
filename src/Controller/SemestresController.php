<?php
declare(strict_types=1);

namespace App\Controller;

class SemestresController extends AppController
{
    public function index()
    {
        $semestres = $this->Semestres->find()->all();
        $this->set(compact('semestres'));
    }

    public function add()
    {
        $semestre = $this->Semestres->newEmptyEntity();
        if ($this->request->is('post')) {
            $semestre = $this->Semestres->patchEntity($semestre, $this->request->getData());
            if ($this->Semestres->save($semestre)) {
                $this->Flash->success('Semestre guardado.');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se pudo guardar.');
        }
        $this->set(compact('semestre'));
    }

    public function edit($id = null)
    {
        $semestre = $this->Semestres->get($id);
        if ($this->request->is(['post', 'put', 'patch'])) {
            $semestre = $this->Semestres->patchEntity($semestre, $this->request->getData());
            if ($this->Semestres->save($semestre)) {
                $this->Flash->success('Semestre actualizado.');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se pudo actualizar.');
        }
        $this->set(compact('semestre'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $semestre = $this->Semestres->get($id);
        if ($this->Semestres->delete($semestre)) {
            $this->Flash->success('Semestre eliminado.');
        } else {
            $this->Flash->error('No se pudo eliminar.');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function view($id = null)
    {
        $semestre = $this->Semestres->get($id, [
            'contain' => [
                'CursosAprobados' => ['Alumnos', 'Cursos', 'Secciones'],
            ],
        ]);
        $this->set(compact('semestre'));
    }

}
