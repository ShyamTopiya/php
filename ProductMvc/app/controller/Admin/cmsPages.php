<?php
namespace app\controller\Admin;
use \Core\view;
use \app\model\Product;
use \app\model\Addcms;

class Cmspages extends \core\controller
{
    public function addNewaction()
    {
        $cms = Product::getAll('cms_pages');
        view::renderTemplate('addCms/index.html',['cms'=>$cms]);
    }
    public function addCmsaction()
    { 
        Addcms::addCms($_POST); 
    }
    public function editaction()
    {
    $cms = Addcms::editCms($this->route_params['id']);
    view::renderTemplate('addCms/index.html',['edit'=>'edit','cms'=>$cms]);
    }
    public function updateCms()
    {
        Addcms::updateCms($this->route_params['id'],$_POST);
    }

    public function delete()
    {
        Addcms::deleteCms($this->route_params['id']);
    }
}