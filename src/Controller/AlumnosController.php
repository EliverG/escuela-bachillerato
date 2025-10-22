<?php
declare(strict_types=1);

namespace App\Controller;

class AlumnosController extends AppController
{
    // public function index()
    // {
    //   // Consulta con relaciones
    // $query = $this->Alumnos->find('all', [
    //     'contain' => ['Carreras'],
    //     'order' => ['Alumnos.id_alumno' => 'DESC']
    // ]);

    // // Paginación moderna (CakePHP 5)
    // $alumnos = $this->paginate($query);

    // $this->set(compact('alumnos'));
    // }

   public function index()
{
    $q = trim((string)$this->request->getQuery('q', ''));
    $carreraId = $this->request->getQuery('carrera_id');

    $query = $this->Alumnos->find('all', [
        'contain' => ['Carreras'],
    ]);

    // Filtro por nombre/apellido
    if ($q !== '') {
        $like = '%' . $q . '%';
        $query->where([
            'OR' => [
                'Alumnos.nombres LIKE' => $like,
                'Alumnos.apellidos LIKE' => $like,
            ]
        ]);
    }

    // Filtro por carrera
    if (!empty($carreraId)) {
        $query->where(['Alumnos.id_carrera' => $carreraId]);
    }

    $query->order(['Alumnos.id_alumno' => 'DESC']);

    // Paginación optimizada
    $alumnos = $this->paginate($query, ['limit' => 10]);

    // Listado de carreras para el filtro
    $carreras = $this->Alumnos->Carreras->find('list', [
        'keyField' => 'id_carrera',
        'valueField' => 'nombre'
    ])->order(['nombre' => 'ASC'])->all();

    $this->set(compact('alumnos', 'carreras', 'q', 'carreraId'));
}



    public function view($id = null)
    {
        $alumno = $this->Alumnos->get($id, [
            'contain' => [
                'Carreras',
                'CursosAprobados' => ['Cursos', 'Semestres', 'Secciones']
            ],
        ]);

        $this->set(compact('alumno'));
    }

    public function add()
    {
        $alumno = $this->Alumnos->newEmptyEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            // Manejo de imagen
            $file = $this->request->getData('fotografia');
            if ($file && $file->getError() === UPLOAD_ERR_OK) {
                $filename = time() . '_' . $file->getClientFilename();
                $file->moveTo(WWW_ROOT . 'img' . DS . 'alumnos' . DS . $filename);
                $data['fotografia'] = 'alumnos/' . $filename; // Guardar solo subpath
            } else {
                $data['fotografia'] = null;
            }

            $alumno = $this->Alumnos->patchEntity($alumno, $data);
            if ($this->Alumnos->save($alumno)) {
                $this->Flash->success('El alumno ha sido guardado correctamente.');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se pudo guardar el alumno. Inténtalo nuevamente.');
        }

        $carreras = $this->Alumnos->Carreras->find('list')->all();
        $this->set(compact('alumno', 'carreras'));
    }

    public function edit($id = null)
    {
        $alumno = $this->Alumnos->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();

            // Manejo de imagen
            $file = $this->request->getData('fotografia');
            if ($file && $file->getError() === UPLOAD_ERR_OK) {
                // Eliminar anterior si existe
                if (!empty($alumno->fotografia) && file_exists(WWW_ROOT . 'img' . DS . $alumno->fotografia)) {
                    unlink(WWW_ROOT . 'img' . DS . $alumno->fotografia);
                }

                $filename = time() . '_' . $file->getClientFilename();
                $file->moveTo(WWW_ROOT . 'img' . DS . 'alumnos' . DS . $filename);
                $data['fotografia'] = 'alumnos/' . $filename;
            } else {
                unset($data['fotografia']);
            }

            $alumno = $this->Alumnos->patchEntity($alumno, $data);
            if ($this->Alumnos->save($alumno)) {
                $this->Flash->success('El alumno ha sido actualizado correctamente.');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se pudo actualizar el alumno.');
        }

        $carreras = $this->Alumnos->Carreras->find('list')->all();
        $this->set(compact('alumno', 'carreras'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $alumno = $this->Alumnos->get($id);

        // Eliminar foto asociada
        if (!empty($alumno->fotografia) && file_exists(WWW_ROOT . 'img' . DS . $alumno->fotografia)) {
            unlink(WWW_ROOT . 'img' . DS . $alumno->fotografia);
        }

        if ($this->Alumnos->delete($alumno)) {
            $this->Flash->success('El alumno ha sido eliminado.');
        } else {
            $this->Flash->error('No se pudo eliminar el alumno.');
        }

        return $this->redirect(['action' => 'index']);
    }
}
