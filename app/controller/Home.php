<?php

namespace App\controller;
use App\models\WikiModel;
class Home
{
    public function index()
    {

        include_once __DIR__ . '/../../views/index.php';
        exit();
    }
    public function Tags()
    {
        
        include_once __DIR__ . '/../../views/Tags.php';
        exit();
    }
    public function signup()
    {
        
        include_once __DIR__ . '/../../views/signup.php';
        exit();
    }
    public function login()
    {
        
        include_once __DIR__ . '/../../views/login.php';
        exit();
    }
    public function learnMore()
    
    {
        $id= $_GET['id'];
        $wikiModel = new WikiModel();
        
        $wikis = $wikiModel->findById($id);
        include_once __DIR__ . '/../../views/showDetails.php';
        exit();
    }
   
}