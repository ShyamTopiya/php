<?php
namespace app\controller;
use \Core\view;
use \app\model\product;

class Aboutus extends \core\Controller
{
    public function indexaction() 
    {
        $category = Product::getCategory();
        $cmsPages = Product::getAll('cms_pages');
        $cms = Product::getAll('cms_pages',"WHERE pageTitle = 'About Us'");
       // print_r($cms[0]);
        view::renderTemplate('aboutus/index.html',['cms'=>$cms[0],'category'=>$category,'cmsPages'=>$cmsPages]);
    }
}
?>