<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class PermissoesController extends AppController{

    public function initialize(): void{
        parent::initialize();
        $this->viewBuilder()->setLayout("admin");
    }

    public function addPermissao(){
        $permissao = $this->Permissoes->newEmptyEntity();

        if ($this->request->is("post")){
            $permissaoData = $this->request->getData();

            $permissao = $this->Permissoes->patchEntity($permissao, $permissaoData);
            if ($this->Permissoes->save($permissao)){
                $this->Flash->success("Permissão has been created successfully");
                return $this->redirect(["action"=>"listPermissao"]);
            }else{
                $this->Flash->error("Failed to create Permissão");    
            }
        }

        $this->set(compact("permissao"));
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