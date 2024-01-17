<?php

namespace App\controller;


use App\entities\Wiki;
use App\models\WikiModel;

use App\models\CategoryModel;
use App\models\TagModel;





class WikiController
{
    public function wiki()
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findByAll();
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

            $uploadDir = '../../public/uploads/';
            $uploadFile = $uploadDir . basename($_FILES['image']['name']);

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                $image = "/wiki/public/uploads/" . $_FILES['image']['name'];
                $newWiki = new Wiki(null, $title, $content, $user_id, $category_id, $image, null,0, $tags);
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
        $query = isset($_GET['q']) ? $_GET['q'] : '';
        $wikiModel = new WikiModel();
        $wiki = $wikiModel->search($query);
        echo json_encode($wiki);

    }
    public function deleteWiki()
    {
        if (isset($_GET["id"])) {
            $id = $_GET['id'];
            $wikiModel = new WikiModel();
            $wikiModel->deleteById($id);
            header("Location: home");
          
        } else {
            echo "error during delete";
        }
    }
}