<?php
namespace app\controller;
use \Core\view;
use \app\model\product;

class contactus extends \core\Controller
{
    public function indexaction() 
    {
        $cms = Product::getAll('cms_pages',"WHERE pageTitle = 'Contact US'");
        //print_r($cms[0]);
        view::renderTemplate('contactus/index.html',['cms'=>$cms[0]]);
    }
}
?>