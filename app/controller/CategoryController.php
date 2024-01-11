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
    public function editCategory()
    {
        require_once __DIR__ .'/../../views/admin/editcategory.php';
    }
    public function saveCategory()
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
    public function getAllCategories()
    {
        $categoryModel = new CategoryModel();;
        $categories=$categoryModel->findByAll();
        
        require_once __DIR__ .'/../../views/admin/categories.php';
         
       
    }
    public function deleteCategory()
    {
        $id= $_GET['id'];
        $categoryModel = new CategoryModel();
        $categoryModel->deleteById($id);
        header("Location: categories");
    }
    public function updateCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updatecat'])) {
            $id= $_GET['id'];
            $name = $_POST['name'];
            $Category = new Category($id,$name);
            $categoryModel = new CategoryModel();
            $categoryModel->update($Category);
         
            header("Location: categories");
        exit;
        }
       
     
    }
}