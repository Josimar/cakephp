<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Event\Event;
use ArrayObject;
use DateTime;
use Cake\I18n\Date;
use Cake\I18n\Time;
use Cake\I18n\FrozenTime;

class BranchesTable extends Table{

    public function initialize(array $config): void{
        $this->setTable("branches");
        $this->belongsTo("branch_college",[
            "className"=>"colleges"
        ])->setForeignKey("collegeid");
    }

    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        if (isset($data['startdate'])) {
            $startdate = $data['startdate'];
            $data['startdate'] = date('yy-m-d h:m:s', strtotime($data['startdate']));
        }
        if (isset($data['enddate'])) {
            $enddate = $data['enddate'];
            $data['enddate'] = date('yy-m-d h:m:s', strtotime($data['enddate']));
        }
    }

}

?>