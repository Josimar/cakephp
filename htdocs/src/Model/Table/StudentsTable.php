<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class StudentsTable extends Table{

    public function initialize(array $config): void{
        $this->setTable("students");

        $this->belongsTo("studentCollege", [
                "className" => "Colleges",
                "foreignKey" => "collegeid",
        ]);

        $this->belongsTo("studentBranch", [
            "className" => "Branches",
            "foreignKey" => "branchid",
        ]);
    }

}

?>