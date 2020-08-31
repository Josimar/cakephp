<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class papeisTable extends Table{

    public function initialize(array $config): void{
        $this->setTable("papeis");
    }

}

?>