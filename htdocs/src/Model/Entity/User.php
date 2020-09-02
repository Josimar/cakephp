<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;

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
 
    protected function _setPassword(string $password)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($password);
    }

}

?>