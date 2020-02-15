<?php
namespace app\controller\Admin;
use \Core\view;
use \app\model\AddProducts;


class Products extends \core\controller
{
    public function addNewaction()
    {
        view::renderTemplate('addProduct/index.html');
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
    $products = addProducts::editProduct($this->route_params['id']);
    view::renderTemplate('addProduct/index.html',['edit'=>'edit','products'=>$products]);
    }

    public function updateProduct()
    {
        addProducts::updateProduct($this->route_params['id']);
    }

    public function delete()
    {
        addProducts::deleteProduct($this->route_params['id']);
    }
}