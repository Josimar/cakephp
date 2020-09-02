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
        $this->set("title", "College Report | Management");
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
        $this->set("title", "Student Report | Management");
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
        $this->set("title", "Staff Report | Management");
    }

    public function papelReports(){
        $this->set("title", "Papel Report | Management");
    }      

    public function permissaoReports(){
        $this->set("title", "Permissão Report | Management");
    }      

    public function transporteReports(){
        $this->set("title", "Transporte Report | Management");
    }      

    public function categoriaReports(){
        $this->set("title", "Categoria Report | Management");
    }      

    public function tarefaReports(){
        $this->set("title", "Tarefa Report | Management");
    }      

    public function userReports(){
        $this->set("title", "Users Report | Management");
    }     

}

?>