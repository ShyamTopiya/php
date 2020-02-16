<?php
namespace app\controller;
use \Core\view;
use \app\model\product;

class Home extends \core\Controller
{
    public function indexaction() 
    {
        $cms = Product::getAll('cms_pages',"WHERE pageTitle = 'home'");
        view::renderTemplate('home/index.html',['cms'=>$cms[0]]);
    }
}
?>