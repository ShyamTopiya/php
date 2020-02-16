<?php
namespace app\controller;
use \Core\view;
use \app\model\Product;


class Admin extends \core\controller
{
    public function login()
    {
         view::renderTemplate('login/index.html');
    }
    public function dashboard()
    {
        if($_POST['email'] == 'sam@gmail.com' && $_POST['password'] == '123')
        {
           
            view::renderTemplate('dashboard/index.html');
        }
        else
        {
            echo "not matched";
        }
    }
    public function home()
    {
        view::renderTemplate('dashboard/index.html');
    }
    public function showProduct()
    {
        $products = Product::getAll('products');
       
        view::renderTemplate('product/index.html',['products'=>$products]);
    }
    public function showCategory()
    {
        $category = Product::getAll('categories'); 
        view::renderTemplate('category/index.html',['category'=>$category]);
    }
    public function showCms()
    {
        $cms = Product::getAll('cms_pages'); 
        view::renderTemplate('cms/index.html',['cms'=>$cms]);
    }

    
   
}

?>