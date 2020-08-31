<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Tarefa extends Entity{

    protected $_accessible = [
        "tarefaid" => true,
        "empresaid" => true,
        "projetoid" => true,
        "prioridadeid" => true,
        "categoriaid" => true,
        "usuarioid" => true,
        "descricao" => true,
        "duedate" => true,
        "complete" => true,
        "titulo" => true,
        "percentcomplete" => true,
        "startdate" => true,
        "completed" => true,
        "anexos" => true,
        "statusid" => true,
        "assignto" => true,
        "imageurl" => true,
        "icon" => true,
        "overdue" => true,
        "completedat" => true,
    ];
 
}

?>