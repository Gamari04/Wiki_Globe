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
            $image = $_FILES['image']['name'];
            $temp_name = $_FILES['image']['tmp_name'];
            $uploadDirectory = "../../public/uploads/";
            $destination = $uploadDirectory . $image;
            move_uploaded_file($temp_name, $destination);
            $title = $_POST['title'];
            $content = $_POST['content'];
            $user_id = $_SESSION['user_id'];
            $category_id = $_POST['categorie_id'];
            $tags = $_POST['tag_id'];


            $newWiki = new Wiki(null, $title, $content, $user_id, $category_id, $image, null, $tags);
            $wikimodel = new WikiModel();
            $wikimodel->save($newWiki);




            header('location:home');
        } else {
            echo "Le formulaire n'a pas été soumis.";
        }


    }
}