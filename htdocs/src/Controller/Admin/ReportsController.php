<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class ReportsController extends AppController{

    public function initialize(): void{
        parent::initialize();
        $this->viewBuilder()->setLayout("admin");

        $this->loadModel("Colleges");
        $this->loadModel("Students");
        $this->loadModel("Staffs");
    }

    public function collegeReports(){
        $colleges = $this->Colleges->find()->toList();
        $this->set(compact("colleges"));
        $this->set("title", "College Report | Academics Management");
    }

    public function studentReports(){
        $students = $this->Students->find()->contain([
            "studentCollege" => function($q){
                return $q->select(["id", "name"]);
            },
            "studentBranch" => function($q){
                return $q->select(["id", "name"]);
            }
        ])->toList();
        $this->set(compact("students"));
        $this->set("title", "Student Report | Academics Management");
    }
    
    public function staffReports(){
        $staffs = $this->Staffs->find()->contain([
            "staffCollege" => function($q){
                return $q->select(["id", "name"]);
            },
            "staffBranch" => function($q){
                return $q->select(["id", "name"]);
            }
        ])->toList();
        $this->set(compact("staffs"));
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