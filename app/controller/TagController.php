<?php

namespace App\controller;

use App\entities\Tag;
use App\models\TagModel;





class TagController
{
    public function tag()
    {
        require_once __DIR__ .'/../../views/admin/tags.php';
    }
    public function saveTag()
    {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addtag'])) {
            $name = $_POST['name'];
            $newTag = new Tag(null,$name);
            $tagmodel = new TagModel();
            $tagmodel->save( $newTag);
            
            header("Location: tag");
        exit;
        }
    }
    public function getAllTags()
    {
        $tagModel = new TagModel();;
        $tags=$tagModel->findByAll();
        
        require_once __DIR__ .'/../../views/admin/tags.php';
        
    }
    public function deleteTag()
    {
        $id= $_GET['id'];
        $userModel = new TagModel();
        $userModel->deleteById($id);
        header("Location: tag");
    }
}