<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class PapeisController extends AppController{

    public function initialize(): void{
        parent::initialize();
        $this->viewBuilder()->setLayout("admin");
    }

    public function addPapel(){
        $papel = $this->Papeis->newEmptyEntity();

        if ($this->request->is("post")){
            $papelData = $this->request->getData();

            $papel = $this->Papeis->patchEntity($papel, $papelData);
            if ($this->Papeis->save($papel)){
                $this->Flash->success("Papel has been created successfully");
                return $this->redirect(["action"=>"listPapel"]);
            }else{
                $this->Flash->error("Failed to create Papel");    
            }
        }

        $this->set(compact("papel"));
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