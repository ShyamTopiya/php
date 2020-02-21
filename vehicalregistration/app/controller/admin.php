<?php
namespace app\controller;
use \Core\view;
use \app\model\Fetchdata;


class Admin extends \core\controller
{
    public function indexaction()
    {
       $result =  Fetchdata::getAll('service_registrations');
        
       view::renderTemplate('displayServiceAdmin/index.html',['data'=>$result]);
    }
    public function update()
    {
        $id = $this->route_params['id'];
        $data =  Fetchdata::update('service_registrations',$id);
        Fetchdata::getAll('service_registrations');
        view::renderTemplate('displayServiceAdmin/index.html');
    }
    
}

?>