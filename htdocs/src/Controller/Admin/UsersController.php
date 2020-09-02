<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Controller\Component\AuthComponent;
// use Cake\Auth\DefaultPasswordHasher;
use Authentication\PasswordHasher\DefaultPasswordHasher;

class UsersController extends AppController{

    public function initialize(): void{
        parent::initialize();
        $this->viewBuilder()->setLayout("user");
        $this->loadModel("User");
        $this->Authentication->allowUnauthenticated(['index', 'login']);
    }

    public function login(){
        //$this->autoRender = false;
        // $hasher = new DefaultPasswordHasher(); // ToDo: salvar senha
        // https://www.bookstack.cn/read/cakephp-4.x/91c4a54ff8b0f776.md
        // echo "<h3>This is login page</h3>@".$hasher->hash("123456")."@";

        // $userId = $this->Users->get(1);
        // echo "<h1>".$userId."</h1>";
        // $userId->phone = "996014567";
        // $userId->password = "123456";
        // echo "<h1>".$userId->phone."</h1>";
        // echo "<h1>".$userId->password."</h1>";
        // $this->Users->save($userId);
        // echo "<h1>".$userId."</h1>";

        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            $target = $this->Authentication->getLoginRedirect() ?? '/admin';
            // print_r($target);die();
            return $this->redirect($target);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Invalid username or password');
        }


        /*
        $userId = $this->Auth->user("id");
        if (!empty($userId)){
            return $this->redirect("/admin");
        }else{
            if ($this->request->is("post")){
                $userData = $this->Auth->identity();
                if ($userData){
                    $this->Auth->setUser($userData);
                    return $this->redirect($this->Auth->redirectUrl());
                }else{
                    $this->Flash->error("Invalid login details");
                }
            }
        }
        */

        $this->set("title", "Controle | Login");
    }

    public function dashboard(){
        $this->autoRender = false;
        echo "<h3>This is dashboard page</h3>";
    }

    public function logout(){
        //$this->autoRender = false;
        //echo "<h3>This is logout page</h3>";


        $this->Authentication->logout();
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);

        /*
        $this->Flash->success("Logged out successfully");
        return $this->redirect($this->Auth->logout());
        */
    }
}

?>