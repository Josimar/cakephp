<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Controller\Component\AuthComponent;
// use Cake\Auth\DefaultPasswordHasher;
use Authentication\PasswordHasher\DefaultPasswordHasher;

class UsuariosController extends AppController{

    public function initialize(): void{
        parent::initialize();
        $this->viewBuilder()->setLayout("admin");

        $this->loadModel("Users");
    }

    public function listUser(){
        $users = $this->Users->find()->toList();
        $this->set(compact('users'));
        $this->set("title", "List Users");
    }

    public function addUser(){
        $this->set("title", "Add User");
    }

    public function editUser(){
        $this->set("title", "Edit User");
    }
}

?>