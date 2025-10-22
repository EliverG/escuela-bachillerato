<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CursosTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('cursos');
        $this->setPrimaryKey('id_curso');
        $this->setDisplayField('nombre');

        $this->belongsTo('Carreras', [
            'foreignKey' => 'id_carrera',
            'joinType' => 'INNER',
        ]);

        $this->hasMany('CursosAprobados', [
            'foreignKey' => 'id_curso',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('nombre', 'El nombre es obligatorio')
            ->maxLength('nombre', 100, 'Máximo 100 caracteres')
            ->integer('creditos', 'Debe ser un número entero')
            ->greaterThanOrEqual('creditos', 0, 'Los créditos no pueden ser negativos');
        return $validator;
    }
}
