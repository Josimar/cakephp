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

    /*
    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);

        if ($this->request->param('action') === 'assignCollegeBranch') {
            $this->eventManager()->off($this->Csrf);
        }
    }
    */

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
        $student = $this->Students->get($id);

        if ($this->request->is(["post", "put"])){
            $studentData = $this->request->getData();

            $fileObject = $this->request->getData("urlimage");
            $filename = $fileObject->getClientFilename();

            if (!empty($filename)){
                $fileExtension = $fileObject->getClientMediaType();

                $validExtension = array("image/png", "image/jpg", "image/jpeg", "image/gif");
                if (in_array($fileExtension, $validExtension)){
                    $destination = WWW_ROOT."upload\students".DS.$filename;
                    $fileObject->moveTo($destination);
                    
                    $studentData['urlimage'] = "students".DS.$filename;
                }else{
                    $this->Flash->error("Upload file is not a valid image");
                    return $this->redirect(["action"=>"listStudent"]);
                }
            }else{
                $studentData['urlimage'] = $student->urlimage;
            }

            $student = $this->Students->patchEntity($student, $studentData);
            
            if ($this->Students->save($student)){
                $this->Flash->success("Student has been updated successfully");
            }else{
                $this->Flash->error("Failed to update Student");    
            }

            return $this->redirect(["action"=>"listStudent"]);
        }

        $this->set(compact("student"));

        $this->set("title", "Edit Student | Academics Management");
    }

    public function deleteStudent($id = null){
        $this->request->allowMethod(["post" ,"delete"]);
        $student = $this->Students->get($id);
        if ($this->Students->delete($student)){
            $this->Flash->success("Student has been deleted successfully");
        }else{
            $this->Flash->error("Failed to delete student");
        }

        return $this->redirect(["action"=>"listStudent"]);
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

    public function assignCollegeBranch(){
        if ($this->request->is("post")){
            $studentid = $this->request->getDate("studentid");
            $student = $this->Students->get($studentid, [
                "contain"=>[]
            ]);

            $studentData = $this->request->getData();

            $student = $this->Students->patchEntity($student, $studentData);

            if ($this->Students->save($student)){
                $this->Flash->success("College Branch assigned successfully to student");
            }else{
                $this->Flash->error("Failed to assign college/branch");
            }

            return $this->redirect(["action"=>"listStudent"]);
        }
    }

    public function removeAssignedCollegeBranch($id = null){
        $student = $this->Students->get($id);

        $student['branchid'] = null;
        $student['collegeid'] = null;

        if ($this->Students->save($student)){
            $this->Flash->success("Assigned College/Branch removed successfully");
        }else{
            $this->Flash->error("Failed to remove college/branch");
        }

        return $this->redirect(["action"=>"listStudent"]);
    }

}

?>