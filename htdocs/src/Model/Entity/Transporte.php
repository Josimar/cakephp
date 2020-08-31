<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Transporte extends Entity{

    protected $_accessible = [
        "nome" => true,
        "tipo" => true,
        "descricao" => true,
        "urlfoto" => true,
        "urlvideo" => true,
        "latitude" => true,
        "longitude" => true
    ];

}

?>