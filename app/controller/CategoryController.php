<?php

namespace App\controller;

use App\entities\Category;
use App\models\CategoryModel;

class CategoryController
{
    public function categories()
    {
        require_once __DIR__ .'/../../views/admin/categories.php';
    }
    public function saveUser()
    {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addCategory'])) {
            $name = $_POST['name'];
            $newCategory = new Category(null,$name);
            $categorymodel = new CategoryModel();
            $categorymodel->save($newCategory);
            
            header("Location: categories");
        exit;
        }
        
        
    }
}