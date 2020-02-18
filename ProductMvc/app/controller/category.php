<?php
namespace app\controller;
use \Core\view;
use \app\model\product;

class Category extends \core\Controller
{
    public function viewaction() 
    {
        $category = Product::getCategory();
        $cmsPages = Product::getAll('cms_pages');
        $urlKey = $this->route_params['url'];

        $product = Product::getAll('products',"WHERE urlKey = '$urlKey'"); 
        
       view::renderTemplate('home/index.html',['product'=>$product,'category'=>$category,'cmsPages'=>$cmsPages]);
    }
}
?>