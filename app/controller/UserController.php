<?php

namespace App\controller;

use App\entities\User;
use App\models\UserModel;

class UserController
{
    
    public function saveUser()
    {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addUser'])) {
            $firstName = $_POST['firstname'];
            $lastName = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $newUser = new User(null,$firstName, $lastName, $email,'author', $password);
            $usermodel = new UserModel();
            $usermodel->save($newUser);
            var_dump($usermodel);
            header("Location: http://localhost/wiki/login");
        exit;
        }
        
        
    }
    public function loguser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
       
            $email = $_POST['email'];
            $password = $_POST['password'];        
            $usermodel = new UserModel();
            $usermodel->login($email,$password);
        }
    }
}
