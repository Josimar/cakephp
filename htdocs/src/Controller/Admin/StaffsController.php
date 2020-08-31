<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class StaffsController extends AppController{

    public function initialize(): void{
        parent::initialize();
        $this->viewBuilder()->setLayout("admin");

        $this->loadModel("Staffs");
        $this->loadModel("Colleges");
        $this->loadModel("Branches");
    }

    public function addStaff(){
        $staff = $this->Staffs->newEmptyEntity();

        if ($this->request->is("post")){
            // print_r($this->request->getData());
            $fileObject = $this->request->getData("urlimage");
            // print_r($fileObject);die;
            $filename = $fileObject->getClientFilename();
            $fileExtension = $fileObject->getClientMediaType();

            $validExtension = array("image/png", "image/jpg", "image/jpeg", "image/gif");
            if (in_array($fileExtension, $validExtension)){
                $destination = WWW_ROOT."upload\\staffs".DS.$filename;
                $fileObject->moveTo($destination);
                $staffData = $this->request->getData();
                $staffData['urlimage'] = "staffs".DS.$filename;

                $staff = $this->Staffs->patchEntity($staff, $staffData);
                if ($this->Staffs->save($staff)){
                    $this->Flash->success("Staff has been created successfully");
                    return $this->redirect(["action"=>"listStaff"]);
                }else{
                    $this->Flash->error("Failed to create Staff");    
                }
            }else{
                $this->Flash->error("Upload file is not a valid image");
            }
        }

        $this->set(compact("staff"));
        $this->set("title", "Add Staff | Academics Management");
    }

    public function listStaff(){
        $staffs = $this->Staffs->find()->contain([
            "staffCollege" => function($q){
                return $q->select(["id", "name"]);
            },
            "staffBranch" => function($q){
                return $q->select(["id", "name"]);
            }
        ])->toList();

        $colleges = $this->Colleges->find()->select(["id", "name"])->toList();
        $branches = $this->Branches->find()->select(["id", "name"])->toList();
        $this->set(compact('staffs', 'colleges', 'branches'));

        $this->set("title", "List Staff | Academics Management");
    }
    
    public function editStaff($id = null){
        $staff = $this->Staffs->get($id);

        if ($this->request->is(["post", "put"])){
            $staffData = $this->request->getData();

            $fileObject = $this->request->getData("urlimage");
            $filename = $fileObject->getClientFilename();
            $fileExtension = $fileObject->getClientMediaType();

            if (!empty($filename)){
                $validExtension = array("image/png", "image/jpg", "image/jpeg", "image/gif");
                if (in_array($fileExtension, $validExtension)){
                    $destination = WWW_ROOT."upload\\staffs".DS.$filename;
                    $fileObject->moveTo($destination);
    
                    $staffData['urlimage'] = "staffs".DS.$filename;
                }else{
                    $this->Flash->error("Upload file is not a valid image");
                }
            }else{
                $staffData['urlimage'] = $staff->urlimage;
            }

            $staff = $this->Staffs->patchEntity($staff, $staffData);
            if ($this->Staffs->save($staff)){
                $this->Flash->success("Staff has been updated successfully");
            }else{
                $this->Flash->error("Failed to update Staff");    
            }

            return $this->redirect(["action"=>"listStaff"]);
        }

        $this->set(compact("staff"));
        $this->set("title", "Edit Staff | Academics Management");
    }

    public function deleteStaff($id = null){
        $this->request->allowMethod(["post" ,"delete"]);
        $staff = $this->Staffs->get($id);
        if ($this->Staffs->delete($staff)){
            $this->Flash->success("Staff has been deleted successfully");
        }else{
            $this->Flash->error("Failed to delete staff");
        }

        return $this->redirect(["action"=>"listStaff"]);
    }

    public function assignCollegeBranch(){
        if ($this->request->is("post")){
            $staffid = $this->request->getDate("staffid");
            $staff = $this->Staffs->get($staffid, [
                "contain"=>[]
            ]);

            $staffData = $this->request->getData();

            $staff = $this->Staffs->patchEntity($staff, $staffData);

            if ($this->Staffs->save($staff)){
                $this->Flash->success("College Branch assigned successfully to staff");
            }else{
                $this->Flash->error("Failed to assign college/branch");
            }

            return $this->redirect(["action"=>"listStaff"]);
        }
    }

    public function removeAssignedCollegeBranch($id = null){
        $staff = $this->Staffs->get($id);

        $staff['branchid'] = null;
        $staff['collegeid'] = null;

        if ($this->Staffs->save($staff)){
            $this->Flash->success("Assigned College/Branch removed successfully");
        }else{
            $this->Flash->error("Failed to remove college/branch");
        }

        return $this->redirect(["action"=>"listStaff"]);
    }

}

?>