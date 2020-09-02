<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class CategoriasController extends AppController{

    public function initialize(): void{
        parent::initialize();
        $this->viewBuilder()->setLayout("admin");

        $this->loadComponent('Paginator');
        $this->loadModel("Categorias");
    }

    public function addCategoria(){
        $categoria = $this->Categorias->newEmptyEntity();

        if ($this->request->is("post")){
            $categoriaData = $this->request->getData();

            $categoria = $this->Categorias->patchEntity($categoria, $categoriaData);
            if ($this->Categorias->save($categoria)){
                $this->Flash->success("Categoria has been created successfully");
                return $this->redirect(["action"=>"listCategoria"]);
            }else{
                $this->Flash->error("Failed to create Categoria");    
            }
        }

        $this->set(compact("categoria"));
        $this->set("title", "Add Categoria");
    }

    public function listCategoria(){
        $this->paginate = ['limit' => '15'];
        $categorias = $this->paginate($this->Categorias->find('all'));
        
        $this->set(compact("categorias"));
        $this->set("title", "List Categoria");
    }
    
    public function editCategoria($id = null){
        $this->set("title", "Edit Categoria");
    }

    public function deleteCategoria($id = null){

    }  

}

?>