<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class College extends Entity{

    protected $_accessible = [
        "name" => true,
        "shortname" => true,
        "email" => true,
        "phone" => true,
        "description" => true,
        "location" => true,
        "totalfaculty" => true,
        "status" => true,
        "imageurl" => true,
    ];

}

?>