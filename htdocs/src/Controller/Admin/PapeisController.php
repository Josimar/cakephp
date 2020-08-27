<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class PapeisController extends AppController{

    public function initialize(): void{
        parent::initialize();
        $this->viewBuilder()->setLayout("admin");
    }

    public function addPapel(){
        $this->set("title", "Add Papel | Academics Management");
    }

    public function listPapel(){
        $this->set("title", "List Papel | Academics Management");
    }
    
    public function editPapel($id = null){
        $this->set("title", "Edit Papel | Academics Management");
    }

    public function deletePapel($id = null){

    }  

}

?>