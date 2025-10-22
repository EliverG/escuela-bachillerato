<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CarrerasTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        // Nombre real de la tabla
        $this->setTable('carreras');
        // Clave primaria
        $this->setPrimaryKey('id_carrera');
        // Campo que Cake usará como "displayField"
        $this->setDisplayField('nombre');

        // Relación inversa: una carrera tiene muchos alumnos
        $this->hasMany('Alumnos', [
            'foreignKey' => 'id_carrera',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('nombre', 'El nombre es obligatorio')
            ->maxLength('nombre', 100, 'Máximo 100 caracteres');
        return $validator;
    }
}
