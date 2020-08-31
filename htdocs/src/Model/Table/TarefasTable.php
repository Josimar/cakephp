<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class TarefasTable extends Table{

    public function initialize(array $config): void{
        $this->setTable("tarefas");
    }

}

?>