<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class StudentsController extends AppController{

    public function initialize(): void{
        parent::initialize();
        $this->viewBuilder()->setLayout("admin");

        $this->loadModel("Students");
        $this->loadModel("Colleges");
        $this->loadModel("Branches");
    }


    public function addStudent(){
        $student = $this->Students->newEmptyEntity();

        if ($this->request->is("post")){
            // print_r($this->request->getData());
            $fileObject = $this->request->getData("urlimage");
            // print_r($fileObject);die;
            $filename = $fileObject->getClientFilename();
            $fileExtension = $fileObject->getClientMediaType();

            $validExtension = array("image/png", "image/jpg", "image/jpeg", "image/gif");
            if (in_array($fileExtension, $validExtension)){
                $destination = WWW_ROOT."upload\students".DS.$filename;
                $fileObject->moveTo($destination);
                $studentData = $this->request->getData();
                $studentData['urlimage'] = "students".DS.$filename;

                $student = $this->Students->patchEntity($student, $studentData);
                if ($this->Students->save($student)){
                    $this->Flash->success("Student has been created successfully");
                    return $this->redirect(["action"=>"listStudent"]);
                }else{
                    $this->Flash->error("Failed to create Student");    
                }
            }else{
                $this->Flash->error("Upload file is not a valid image");
            }
        }

        $this->set(compact("student"));
        $this->set("title", "Add Student | Academics Management");
    }

    public function listStudent(){
        $students = $this->Students->find()->contain([
            "studentCollege" => function($q){
                return $q->select(["id", "name"]);
            },
            "studentBranch" => function($q){
                return $q->select(["id", "name"]);
            }
        ])->toList();

        $colleges = $this->Colleges->find()->select(["id", "name"])->toList();
        $branches = $this->Branches->find()->select(["id", "name"])->toList();
        $this->set(compact('students', 'colleges', 'branches'));

        $this->set("title", "List Student | Academics Management");
    }
    
    public function editStudent($id = null){
        $this->set("title", "Edit Student | Academics Management");
    }

    public function deleteStudent($id = null){

    }    

    public function getCollegeBranches(){
        $this->autoRender = false;
        $collegeid = $this->request->getQuery("collegeid");

        $branches = $this->Branches->find()->select(["id", "name"])->where(["collegeid"=>$collegeid])->toList();
        
        echo json_encode(array(
            "status" => 200,
            "message" => "Branches found",
            "branches" => $branches
        ));
    }

}

?>