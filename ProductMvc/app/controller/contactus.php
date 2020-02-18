<?php
namespace app\controller;
use \Core\view;
use \app\model\product;

class contactus extends \core\Controller
{
    public function indexaction() 
    {
        $category = Product::getCategory();
        $cmsPages = Product::getAll('cms_pages');
        $cms = Product::getAll('cms_pages',"WHERE pageTitle = 'Contact US'");
        //print_r($cms[0]);
        view::renderTemplate('contactus/index.html',['cms'=>$cms[0],'category'=>$category,'cmsPages'=>$cmsPages]);
    }
}
?>