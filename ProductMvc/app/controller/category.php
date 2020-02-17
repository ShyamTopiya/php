<?php
namespace app\controller;
use \Core\view;
use \app\model\product;

class Category extends \core\Controller
{
    public function viewaction() 
    {
            print_r($_POST);
        //   $category = Product::getCategory();
        //   view::renderTemplate('home/index.html',['category'=>$category]);
        
    }
}
?>