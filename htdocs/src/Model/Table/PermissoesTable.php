<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class PermissoesTable extends Table{

    public function initialize(array $config): void{
        $this->setTable("permissoes");
    }

}

?>