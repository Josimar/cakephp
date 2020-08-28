<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Student extends Entity{

    protected $_accessible = [
        "name" => true,
        "email" => true,
        "phone" => true,
        "collegeid" => true,
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