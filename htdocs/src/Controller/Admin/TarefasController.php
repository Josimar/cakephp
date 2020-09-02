<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class TarefasController extends AppController{

    public function initialize(): void{
        parent::initialize();
        $this->viewBuilder()->setLayout("admin");

        $this->loadComponent('Paginator');
        $this->loadModel("Tarefas");
    }

    public function addTarefa(){
        $tarefa = $this->Tarefas->newEmptyEntity();

        if ($this->request->is("post")){
            // print_r($this->request->getData());
            $fileObject = $this->request->getData("imageurl");
            // print_r($fileObject);die;
            $filename = $fileObject->getClientFilename();
            $fileExtension = $fileObject->getClientMediaType();

            $validExtension = array("image/png", "image/jpg", "image/jpeg", "image/gif");
            if (in_array($fileExtension, $validExtension)){
                $destination = WWW_ROOT."upload\tarefas".DS.$filename;
                $fileObject->moveTo($destination);
                $tarefaData = $this->request->getData();
                $tarefaData['imageurl'] = "tarefas".DS.$filename;

                $tarefa = $this->Tarefas->patchEntity($tarefa, $tarefaData);
                if ($this->Tarefas->save($tarefa)){
                    $this->Flash->success("Tarefa has been created successfully");
                    return $this->redirect(["action"=>"listTarefa"]);
                }else{
                    $this->Flash->error("Failed to create Tarefa");    
                }
            }else{
                $this->Flash->error("Upload file is not a valid image");
            }
        }

        $this->set(compact("tarefa"));
        $this->set("title", "Add Tarefa");
    }

    public function listTarefa(){
        $this->paginate = ['limit' => '10'];
        $tarefas = $this->paginate($this->Tarefas->find('all'));

        $this->set(compact("tarefas"));
        $this->set("title", "List Tarefa");
    }
    
    public function editTarefa($id = null){
        $this->set("title", "Edit Tarefa");
    }

    public function deleteTarefa($id = null){

    }  

}

?>