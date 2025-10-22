<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class SeccionesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('secciones');
        $this->setPrimaryKey('id_seccion');
        $this->setDisplayField('nombre');

        $this->hasMany('CursosAprobados', [
            'foreignKey' => 'id_seccion',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('nombre', 'El nombre de la sección es obligatorio')
            ->maxLength('nombre', 10, 'Máximo 10 caracteres');
        return $validator;
    }
}
