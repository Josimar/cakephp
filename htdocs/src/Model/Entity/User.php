<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class User extends Entity{

    protected $_accessible = [
        "name"=>true,
        "lastname"=>true,
        "email"=>true,
        "password"=>true,
        "phone"=>true,
        "token"=>true,
        "remember_token"=>true,
    ];
 
}

?>