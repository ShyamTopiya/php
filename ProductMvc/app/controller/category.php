<?php
namespace app\controller;
use \Core\view;
use \app\model\product;

class Category extends \core\Controller
{
    public function viewaction() 
    {
        $urlKey = $this->route_params['url'];
        $product = Product::getAll('categories',"WHERE urlKey = '$urlKey'"); 
        view::renderTemplate('home/index.html',['product'=>$product[0]]);
    }
}
?>