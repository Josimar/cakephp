<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Staff extends Entity{

    protected $_accessible = [
        "name" => true,
        "email" => true,
        "phone" => true,
        "collegeid" => true,
        "designation" => true,
        "stafftype" => true,
        "branchid" => true,
        "address" => true,
        "bloodgroup" => true,
        "gender" => true,
        "urlimage" => true,
        "dob" => true,
        "status" => true,
    ];
 
}

?>