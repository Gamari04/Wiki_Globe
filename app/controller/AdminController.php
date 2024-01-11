<?php
namespace App\controller;
use App\models\UserModel;
use App\models\WikiModel;

class AdminController
{
    public function admin()
    {
        
        include_once __DIR__ . '/../../views/admin/adminPannel.php';
        exit();
    }
    public function getAllUsers()
    {
        $userModel = new UserModel();;
        $users=$userModel->findByAll();
        
        require_once __DIR__ .'/../../views/admin/allAuthors.php';
        
    }
    public function getAllWikis()
    {
        $wikiModel = new WikiModel();
        
        $wikis = $wikiModel->findByAll();



        require_once __DIR__ . '/../../views/admin/allWikis.php';
    }
  
    public function deleteUser()
    {
        $id= $_GET['id'];
        $userModel = new UserModel();
        $userModel->deleteById($id);
        header("Location: allusers");
    }
}