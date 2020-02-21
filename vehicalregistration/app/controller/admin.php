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
        $result =  Fetchdata::getAll('service_registrations',"WHERE user_id = 3");
        view::renderTemplate('vehicleservice/index.html',['data'=>$result,'edit'=>'edit']);

    }
}

?>