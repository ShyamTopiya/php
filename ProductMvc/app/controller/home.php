<?php
namespace app\controller;
use \Core\view;
use \app\model\product;

class Home extends \core\Controller
{
    public function indexaction() 
    {
      
         $category = Product::getCategory();
         $cmsPages = Product::getAll('cms_pages');
         view::renderTemplate('frontbase.html',['category'=>$category,'cmsPages'=>$cmsPages]);
    }
}
?>