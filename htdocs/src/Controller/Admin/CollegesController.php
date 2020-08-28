<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class CollegesController extends AppController{

    public function initialize(): void{
        parent::initialize();
        $this->loadModel("Colleges");
        $this->viewBuilder()->setLayout("admin");
    }

    public function addCollege(){
        $college = $this->Colleges->newEmptyEntity();

        if ($this->request->is('post')){
            $fileObject = $this->request->getData("imageurl");
            // print_r($fileObject);die;
            $filename = $fileObject->getClientFilename();
            $fileExtension = $fileObject->getClientMediaType();

            $validExtension = array("image/png", "image/jpg", "image/jpeg", "image/gif");
            if (in_array($fileExtension, $validExtension)){
                $destination = WWW_ROOT."upload\colleges".DS.$filename;
                $fileObject->moveTo($destination);
                $collegeData = $this->request->getData();
                $collegeData['imageurl'] = "colleges".DS.$filename;

                $college = $this->Colleges->patchEntity($college, $collegeData);
                if ($this->Colleges->save($college)){
                    $this->Flash->success("College has been created successfully");
                    return $this->redirect(["action"=>"listCollege"]);
                }else{
                    $this->Flash->error("Failed to create College");    
                }
            }else{
                $this->Flash->error("Upload file is not a valid image");
            }
        }

        $this->set(compact("college"));
        $this->set("title", "Add College | Academics Management");
    }

    public function listCollege(){
        $colleges = $this->Colleges->find()->toList();
        $this->set(compact("colleges"));
        $this->set("title", "List College | Academics Management");
    }
    
    public function editCollege($id = null){
        $college = $this->Colleges->get($id, [
            "contain" => []
        ]);

        if ($this->request->is(['post', 'put', 'patch'])){
            $collegeData = $this->request->getData();

            $fileObject = $this->request->getData("imageurl");
            // print_r($fileObject);die;
            $filename = $fileObject->getClientFilename();
            $fileExtension = $fileObject->getClientMediaType();

            if (!empty($filename)){
                $validExtension = array("image/png", "image/jpg", "image/jpeg", "image/gif");
                if (in_array($fileExtension, $validExtension)){
                    $destination = WWW_ROOT."upload\colleges".DS.$filename;
                    $fileObject->moveTo($destination);
                    $collegeData['imageurl'] = "colleges".DS.$filename;
                }else{
                    $this->Flash->error("Upload file is not a valid image");
                }
            }else{
                $collegeData['imageurl'] = $college->imageurl;
            }

            $college = $this->Colleges->patchEntity($college, $collegeData);
            if ($this->Colleges->save($college)){
                $this->Flash->success("College has been updated successfully");
                return $this->redirect(["action"=>"listCollege"]);
            }else{
                $this->Flash->error("Failed to updated College");    
            }
        }

        $this->set(compact("college"));
        $this->set("title", "Edit College | Academics Management");
    }

    public function deleteCollege($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $college = $this->Colleges->get($id);

        if ($this->Colleges->delete($college)){
            $this->Flash->success("College has been deleted successfully");
        }else{
            $this->Flash->error("Failed to delete College");
        }
        Return $this->redirect(["action"=>"listCollege"]);
    }

}

?>