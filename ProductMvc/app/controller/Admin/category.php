<?php
namespace app\controller\Admin;
use \Core\view;
use \app\model\Product;
use \app\model\AddCategory;

class Category extends \core\controller
{
    public function addNewaction()
    {
        $category = Product::getAll('categories');
        view::renderTemplate('addCategory/index.html',['category'=>$category]);
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
    $category = addCategory::editCategory($this->route_params['id']);
    print_r($category);
    view::renderTemplate('addCategory/index.html',['edit'=>'edit','category'=>$category]);
    }

    public function updateProduct()
    {
        addCategory::updateCategory($this->route_params['id']);
    }

    public function delete()
    {
        addCategory::deleteCategory($this->route_params['id']);
    }
}