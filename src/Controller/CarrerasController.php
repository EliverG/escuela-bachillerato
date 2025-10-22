<?php
declare(strict_types=1);

namespace App\Controller;

class CarrerasController extends AppController
{
    public function index()
    {
        $carreras = $this->Carreras->find()
            ->contain([])
            ->order(['Carreras.id_carrera' => 'DESC'])
            ->all();

        $this->set(compact('carreras'));
    }

    public function view($id = null)
    {
        $carrera = $this->Carreras->get($id, [
            'contain' => ['Alumnos'],
        ]);
        $this->set(compact('carrera'));
    }

    public function add()
    {
        $carrera = $this->Carreras->newEmptyEntity();
        if ($this->request->is('post')) {
            $carrera = $this->Carreras->patchEntity($carrera, $this->request->getData());
            if ($this->Carreras->save($carrera)) {
                $this->Flash->success('Carrera guardada.');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se pudo guardar la carrera.');
        }
        $this->set(compact('carrera'));
    }

    public function edit($id = null)
    {
        $carrera = $this->Carreras->get($id);
        if ($this->request->is(['post','put','patch'])) {
            $carrera = $this->Carreras->patchEntity($carrera, $this->request->getData());
            if ($this->Carreras->save($carrera)) {
                $this->Flash->success('Carrera actualizada.');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se pudo actualizar la carrera.');
        }
        $this->set(compact('carrera'));
    }

public function delete($id = null)
{
    $this->request->allowMethod(['post', 'delete']);
    $carrera = $this->Carreras->get($id);

    try {
        if ($this->Carreras->delete($carrera)) {
            $this->Flash->success(__('La carrera ha sido eliminada correctamente.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar la carrera.'));
        }
    } catch (\PDOException $e) {
        // Si el error viene de restricción de clave foránea
        if ($e->getCode() === '23000') {
            $this->Flash->error(__('No se puede eliminar esta carrera porque tiene cursos asociados.'));
        } else {
            $this->Flash->error(__('Error al eliminar la carrera.'));
        }
    }

    return $this->redirect(['action' => 'index']);
}

}
