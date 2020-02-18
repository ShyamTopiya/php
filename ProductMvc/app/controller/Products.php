<?php
namespace app\controller;
use \Core\view;
use \app\model\product;

class Products extends \core\Controller
{
    public function viewaction() 
    {
        
         $category = Product::getCategory();
         $cmsPages = Product::getAll('cms_pages');
         $urlKey = $this->route_params['url'];
         $product = Product::getAll('products',"WHERE productName = '$urlKey'"); 
         view::renderTemplate('showProduct/index.html',['product'=>$product[0],'category'=>$category,'cmsPages'=>$cmsPages]);
    }
}
?>