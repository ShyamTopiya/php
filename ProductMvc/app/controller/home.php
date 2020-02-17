<?php
namespace app\controller;
use \Core\view;
use \app\model\product;

class Home extends \core\Controller
{
    public function indexaction() 
    {
        $category = Product::getCategory();
        view::renderTemplate('home/index.html',['category'=>$category]);
    }
}
?>