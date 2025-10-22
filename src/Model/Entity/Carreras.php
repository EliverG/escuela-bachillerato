<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Carreras extends Entity
{
    protected array $_accessible = [
        '*' => true,
        'id_carrera' => false,
    ];
}
