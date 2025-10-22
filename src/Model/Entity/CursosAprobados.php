<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class CursosAprobados extends Entity
{
    protected array $_accessible = [
        '*' => true,
        'id_curso_aprobado' => false,
    ];
}
