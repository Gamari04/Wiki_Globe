<?php

namespace App\controller;

use App\entities\User;
use App\models\UserModel;

class UserController
{
    public function saveUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adduser'])) {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $newUser = new User(null,$firstName, $lastName, $email, $password);
            $usermodel = new UserModel();
            $usermodel->save($newUser);
        }
    }
}