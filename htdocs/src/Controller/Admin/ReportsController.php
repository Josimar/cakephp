<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class ReportsController extends AppController{

    public function initialize(): void{
        parent::initialize();
        $this->viewBuilder()->setLayout("admin");
    }

    public function collegeReports(){
        $this->set("title", "College Report | Academics Management");
    }

    public function studentReports(){
        $this->set("title", "Student Report | Academics Management");
    }
    
    public function staffReports(){
        $this->set("title", "Staff Report | Academics Management");
    }

    public function papelReports(){
        $this->set("title", "Papel Report | Academics Management");
    }      

    public function permissaoReports(){
        $this->set("title", "Permissão Report | Academics Management");
    }      

    public function transporteReports(){
        $this->set("title", "Transporte Report | Academics Management");
    }      

    public function userReports(){
        $this->set("title", "Users Report | Academics Management");
    }     

}

?>