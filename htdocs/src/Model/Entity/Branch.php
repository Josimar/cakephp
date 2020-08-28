<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Branch extends Entity{

    protected $_accessible = [
        "name" => true,
        "description" => true,
        "collegeid" => true,
        "startdate" => true,
        "enddate" => true,
        "totalseats" => true,
        "totaldurations" => true,
        "status" => true,
    ];

}

?>