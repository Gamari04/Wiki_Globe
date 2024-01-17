<?php
namespace App\controller;
use App\models\CategoryModel;
use App\models\UserModel;
use App\models\WikiModel;
use App\models\TagModel;

class AdminController
{
    public function admin()
    {
        
        $userModel = new UserModel();
        $total=$userModel->getTotalUsers();
        $catModel=new CategoryModel();
        $allCat=$catModel->getTotalCategory();
        $tagModel=new TagModel();
        $allTag=$tagModel->getTotalTag();
        $wikiModel=new WikiModel();
        $allWiki=$wikiModel->getTotalWiki();
        $wikiModel = new WikiModel();
        
        $wikis = $wikiModel->lastWiki();
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