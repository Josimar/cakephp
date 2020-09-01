<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Controller\Component\AuthComponent;

class DashboardsController extends AppController{

    public function initialize(): void{
        parent::initialize();
        $this->viewBuilder()->setLayout("admin");

        $this->loadModel("Colleges");
        $this->loadModel("Students");
        $this->loadModel("Staffs");
        $this->loadModel("Users");
        $this->loadModel("Transportes");
        $this->loadModel("Papeis");
        $this->loadModel("Permissoes");
        $this->loadModel("Categorias");
        $this->loadModel("Tarefas");
    }

    public function index(){
        // $userData = $this->Auth->user();
        //echo "<pre>";
        //echo print_r($userData);
        
        // College
        $collegeQuery = $this->Colleges->find();
        $collegeData = $collegeQuery->select([
            "totalCollege" => $collegeQuery->func()->count("*")
        ])->first();
        $collegeCount = $collegeData->totalCollege;

        // Student
        $studentQuery = $this->Students->find();
        $studentData = $studentQuery->select([
            "totalStudent" => $studentQuery->func()->count("*")
        ])->first();
        $studentCount = $studentData->totalStudent;

        // Staff
        $staffQuery = $this->Staffs->find();
        $staffData = $staffQuery->select([
            "totalStaff" => $staffQuery->func()->count("*")
        ])->first();
        $staffCount = $staffData->totalStaff;

        $userCount = "1";
        $papelCount = "0";
        $permissaoCount = "0";
        $categoriaCount = "0";
        $tarefaCount = "0";
        $transporteCount = "0";

        $this->set(compact("collegeCount", "studentCount", "staffCount", 
         "userCount", "papelCount", "permissaoCount", 
         "categoriaCount", "tarefaCount", "transporteCount"));

        $this->set("title", "Admin Dashboard | Management");
    }

}

?>