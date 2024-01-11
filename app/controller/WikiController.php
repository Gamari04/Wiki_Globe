<?php

namespace App\controller;

session_start();
use App\entities\Wiki;
use App\models\WikiModel;

use App\models\CategoryModel;
use App\models\TagModel;





class WikiController
{
    public function wiki()
    {

        // bring all categories
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findByAll();
        // bring all tags
        $tagModel = new TagModel();
        $tags = $tagModel->findByAll();


        require_once __DIR__ . '/../../views/addWiki.php';
    }


    public function addWiki()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addwiki'])) {
         
            $title = $_POST['title'];
            $content = $_POST['content'];
            $user_id = $_SESSION['user_id'];
            $category_id = $_POST['categorie_id'];
            $tags = $_POST['tag_id'];

            $uploadDir = '../../public/uploads/'; // Set your upload directory path
            $uploadFile = $uploadDir . basename($_FILES['image']['name']);

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                $image = "/wiki/public/uploads/" . $_FILES['image']['name'];
                $newWiki = new Wiki(null, $title, $content, $user_id, $category_id, $image, null, $tags);
                $wikimodel = new WikiModel();
                $wikimodel->save($newWiki);

                header('location:home');
            } else {
                echo "Le formulaire n'a pas été soumis.";
            }

        }
    }
    public function getAllWiki()
    {
        $wikiModel = new WikiModel();
        
        $wikis = $wikiModel->findByAll();



        require_once __DIR__ . '/../../views/index.php';
    }
    public function searchWiki()
    {
        $query=$_GET['q'];
        $wikiModel = new WikiModel();
        $wiki = $wikiModel->search($query);
        echo json_encode($wiki);
       
    }
   
}