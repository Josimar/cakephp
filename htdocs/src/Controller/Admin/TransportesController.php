<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class TransportesController extends AppController{

    public function initialize(): void{
        parent::initialize();
        $this->viewBuilder()->setLayout("admin");

        $this->loadModel("Transportes");
    }

    public function addTransporte(){
        $transporte = $this->Transportes->newEmptyEntity();

        if ($this->request->is("post")){
            $fileObject = $this->request->getData("urlfoto");
            $filename = $fileObject->getClientFilename();
            $fileExtension = $fileObject->getClientMediaType();

            $validExtension = array("image/png", "image/jpg", "image/jpeg", "image/gif");
            if (in_array($fileExtension, $validExtension)){
                $destination = WWW_ROOT."upload\\transportes".DS.$filename;
                $fileObject->moveTo($destination);
                $transporteData = $this->request->getData();
                $transporteData['urlfoto'] = "transportes".DS.$filename;

                $transporte = $this->Transportes->patchEntity($transporte, $transporteData);
                if ($this->Transportes->save($transporte)){
                    $this->Flash->success("Transporte has been created successfully");
                    return $this->redirect(["action"=>"listTransporte"]);
                }else{
                    $this->Flash->error("Failed to create Transporte");    
                }
            }else{
                $this->Flash->error("Upload file is not a valid image");
            }
        }

        $this->set(compact("transporte"));
        $this->set("title", "Add Transporte");
    }

    public function listTransporte(){
        $transportes = $this->Transportes->find()->toList();
        $this->set(compact('transportes'));
        $this->set("title", "List Transporte");
    }
    
    public function editTransporte($id = null){
        $transporte = $this->Transportes->get($id);

        if ($this->request->is(["post", "put"])){
            $transporteData = $this->request->getData();

            $fileObject = $this->request->getData("urlfoto");
            $filename = $fileObject->getClientFilename();
            $fileExtension = $fileObject->getClientMediaType();

            if (!empty($filename)){
                $validExtension = array("image/png", "image/jpg", "image/jpeg", "image/gif");
                if (in_array($fileExtension, $validExtension)){
                    $newName = substr(sprintf("%u", crc32($transporte->nome)),0,8).'_'.$filename;
                    $destination = WWW_ROOT."upload\\transportes".DS.$newName;
                    if (file_exists($destination)){ 
                        unlink($destination);
                    }
                    $fileObject->moveTo($destination);
                    $transporteData['urlfoto'] = "transportes".DS.$newName;
                }else{
                    $this->Flash->error("Upload file is not a valid image");
                }
            }else{
                $transporteData['urlfoto'] = $transporte->urlfoto;
            }

            $transporte = $this->Transportes->patchEntity($transporte, $transporteData);
            if ($this->Transportes->save($transporte)){
                $this->Flash->success("Transporte has been updated successfully");
            }else{
                $this->Flash->error("Failed to update Transporte");    
            }

            return $this->redirect(["action"=>"listTransporte"]);
        }

        $this->set(compact("transporte"));
        $this->set("title", "Edit Transporte");
    }

    public function deleteTransporte($id = null){

    }      

}

?>