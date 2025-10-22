<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class AlumnosTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        // Nombre de la tabla real
        $this->setTable('alumnos');
        // Clave primaria personalizada
        $this->setPrimaryKey('id_alumno');
        // Campo que Cake usará como nombre legible
        $this->setDisplayField('nombres');

        // Relaciones
        $this->belongsTo('Carreras', [
            'foreignKey' => 'id_carrera',
            'joinType' => 'INNER',
        ]);

        $this->hasMany('CursosAprobados', [
            'foreignKey' => 'id_alumno',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('nombres', 'Campo obligatorio')
            ->notEmptyString('apellidos', 'Campo obligatorio')
            ->date('fecha_nacimiento', ['ymd'], 'Formato inválido')
            ->notEmptyString('id_carrera', 'Seleccione una carrera');
        return $validator;
    }
}
