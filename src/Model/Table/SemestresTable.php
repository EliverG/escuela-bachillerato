<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class SemestresTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('semestres');
        $this->setPrimaryKey('id_semestre');
        $this->setDisplayField('nombre');

        $this->hasMany('CursosAprobados', [
            'foreignKey' => 'id_semestre',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('nombre', 'El nombre del semestre es obligatorio')
            ->maxLength('nombre', 50, 'Máximo 50 caracteres');
        return $validator;
    }
}
