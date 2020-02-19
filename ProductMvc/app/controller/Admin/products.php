<?php
namespace app\controller\Admin;
use \Core\view;
use \app\model\AddProducts;
use \app\model\Product;


class Products extends \core\controller
{
    public function addNewaction()
    {
        $childcategory = Product::getAll('categories','WHERE parent_id IS NOT NULL');
        view::renderTemplate('addProduct/index.html',['child'=>$childcategory]);
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
    public function addProduct()
    {
        $_POST = $this->imageValidate();
       
        addProducts::addProduct($_POST);
    }

    public function editaction()
    {
        $childcategory = Product::getAll('categories','WHERE parent_id IS NOT NULL');
         $products = addProducts::editProduct($this->route_params['id']);
        view::renderTemplate('addProduct/index.html',['edit'=>'edit','products'=>$products,'child'=>$childcategory]);
    }

    public function updateProduct()
    {
        $_POST = $this->imageValidate();
        $_POST['updatedAt'] = date('Y-m-d H:i:s',time());
        addProducts::updateProduct($this->route_params['id'],$_POST);
    }

    public function delete()
    {
        addProducts::deleteProduct($this->route_params['id']);
    }
}