<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CursosAprobadosTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('cursos_aprobados');
        $this->setPrimaryKey('id_curso_aprobado');
        $this->setDisplayField('id_curso_aprobado');

        $this->belongsTo('Alumnos', [
            'foreignKey' => 'id_alumno',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('Cursos', [
            'foreignKey' => 'id_curso',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('Semestres', [
            'foreignKey' => 'id_semestre',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('Secciones', [
            'foreignKey' => 'id_seccion',
            'joinType' => 'INNER',
            'propertyName' => 'seccion',

        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->numeric('nota', 'La nota debe ser un número')
            ->range('nota', [0, 100], 'La nota debe estar entre 0 y 100')
            ->notEmptyString('id_alumno', 'Seleccione un alumno')
            ->notEmptyString('id_curso', 'Seleccione un curso')
            ->notEmptyString('id_semestre', 'Seleccione un semestre')
            ->notEmptyString('id_seccion', 'Seleccione una sección');
        return $validator;
    }
}
