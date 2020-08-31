<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class StaffsTable extends Table{

    public function initialize(array $config): void{
        $this->setTable("staffs");

        $this->belongsTo("staffCollege", [
            "className" => "Colleges",
            "foreignKey" => "collegeid",
        ]);

        $this->belongsTo("staffBranch", [
            "className" => "Branches",
            "foreignKey" => "branchid",
        ]);
    }

}

?>