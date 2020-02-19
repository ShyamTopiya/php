<?php
namespace app\controller\Admin;
use \Core\view;
use \app\model\Product;
use \app\model\AddCategory;

class Category extends \core\controller
{
    public function addNewaction()
    {
        //$allcategory = Product::getAll('categories');
        $parentcategory = Product::getAll('categories','WHERE parent_id IS NULL');
        //echo "<pre>";
        //print_r($allcategory);
        //print_r($parentcategory);
        view::renderTemplate('addCategory/index.html',['parentCategory'=>$parentcategory]);
    }
    public function imageValidate()
    {
        $uploadfolder = '../public/uploads/';
        $uploadImage = $uploadfolder . basename($_FILES['Image']['name']);
         if (move_uploaded_file($_FILES['Image']['tmp_name'], $uploadImage))
            echo "image uploaded<br>";
         else
            echo "error";
        $_POST['Image'] = $uploadfolder. $_FILES['Image']['name'];
        return $_POST;
    }
    public function addCategoryaction()
    { 
        $_POST = $this->imageValidate();
        addCategory::addCategory($_POST); 
    }
    public function editaction()
    {
    $parentcategory = Product::getAll('categories','WHERE parent_id IS NULL');
    $category = addCategory::editCategory($this->route_params['id']);
    view::renderTemplate('addCategory/index.html',['edit'=>'edit','category'=>$category,'parentCategory'=>$parentcategory]);
    }

    public function updateCategory()
    {
        $_POST = $this->imageValidate();
        $_POST['updatedAt'] = date('Y-m-d H:i:s',time());
        addCategory::updateCategory($this->route_params['id'],$_POST);
    }

    public function delete()
    {
        Product::deleteCatPro($this->route_params['id']);
    }
}