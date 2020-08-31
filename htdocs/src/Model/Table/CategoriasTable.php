<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class CategoriasTable extends Table{

    public function initialize(array $config): void{
        $this->setTable("categorias");
    }

}

?>