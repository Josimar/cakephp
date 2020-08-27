<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class TransportesController extends AppController{

    public function initialize(): void{
        parent::initialize();
        $this->viewBuilder()->setLayout("admin");
    }

    public function addTransporte(){
        $this->set("title", "Add Transporte | Academics Management");
    }

    public function listTransporte(){
        $this->set("title", "List Transporte | Academics Management");
    }
    
    public function editTransporte($id = null){
        $this->set("title", "Edit Transporte | Academics Management");
    }

    public function deleteTransporte($id = null){

    }      

}

?>