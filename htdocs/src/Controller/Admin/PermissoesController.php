<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class PermissoesController extends AppController{

    public function initialize(): void{
        parent::initialize();
        $this->viewBuilder()->setLayout("admin");
    }

    public function addPermissao(){
        $this->set("title", "Add Permissão | Academics Management");
    }

    public function listPermissao(){
        $this->set("title", "List Permissão | Academics Management");
    }
    
    public function editPermissao($id = null){
        $this->set("title", "Edit Permissão | Academics Management");
    }

    public function deletePermissao($id = null){

    }  

}

?>