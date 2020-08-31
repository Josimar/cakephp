<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Categoria extends Entity{

    protected $_accessible = [
        "categoriaid" => true,
        "descricao" => true,
        "backgroundcolor" => true,
        "hoverbackgroundcolor" => true,
        "icone" => true,
    ];
 
}

?>