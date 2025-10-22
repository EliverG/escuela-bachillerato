<?php
declare(strict_types=1);

namespace App\Controller;

class SeccionesController extends AppController
{
    public function index()
    {
        $secciones = $this->Secciones->find()->all();
        $this->set(compact('secciones'));
    }

    public function add()
    {
        $seccion = $this->Secciones->newEmptyEntity();
        if ($this->request->is('post')) {
            $seccion = $this->Secciones->patchEntity($seccion, $this->request->getData());
            if ($this->Secciones->save($seccion)) {
                $this->Flash->success('Sección guardada.');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se pudo guardar.');
        }
        $this->set(compact('seccion'));
    }

    public function edit($id = null)
    {
        $seccion = $this->Secciones->get($id);
        if ($this->request->is(['post', 'put', 'patch'])) {
            $seccion = $this->Secciones->patchEntity($seccion, $this->request->getData());
            if ($this->Secciones->save($seccion)) {
                $this->Flash->success('Sección actualizada.');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se pudo actualizar.');
        }
        $this->set(compact('seccion'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $seccion = $this->Secciones->get($id);
        if ($this->Secciones->delete($seccion)) {
            $this->Flash->success('Sección eliminada.');
        } else {
            $this->Flash->error('No se pudo eliminar.');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function view($id = null)
    {
        $seccion = $this->Secciones->get($id, [
            'contain' => [
                'CursosAprobados' => ['Alumnos', 'Cursos', 'Semestres'],
            ],
        ]);
        $this->set(compact('seccion'));
    }

}
