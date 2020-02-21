<?php
namespace app\controller;
use \Core\view;
use \app\model\Fetchdata;

class User extends \core\controller
{
    public function login()
    {
         view::renderTemplate('login/index.html');
    }
    public function dashboard()
    {
        $email = $_POST['email']; 
        $password = $_POST['password'];
        $userData =  Fetchdata::getAll('users',"WHERE Email = '$email' AND Password = '$password' ");
        if($userData)
        {
            view::renderTemplate('dashboard/index.html');
        }
        else
        {
            echo "not matched";
        }
    }
    public function registerdata()
    {
         view::renderTemplate('registerdata/index.html');
    }
    public function postdata()
    {
        $preparedData = [];
        $otherdata = [];
        global $errList;
        foreach($_POST as $fieldName => $fieldValue) {
            switch($fieldName) {
                case 'Firstname'    :   if(!preg_match('/^[a-zA-Z]*$/', $fieldValue))
                                            array_push($errList, $fieldName);
                                        else
                                            $preparedData['Firstname'] = $fieldValue;
                                        break;
                case 'LastName'     :   if(!preg_match('/^[a-zA-Z]*$/', $fieldValue))
                                            array_push($errList, $fieldName);
                                        else
                                            $preparedData['LastName'] = $fieldValue;
                                        break;
                case 'Password'     :  
                                            $preparedData['Password'] = $fieldValue;
                                        break;
                case 'Email' :   if(!filter_var($fieldValue, FILTER_VALIDATE_EMAIL)) 
                                            array_push($errList, $fieldName);
                                        else
                                            $preparedData['Email'] = $fieldValue;
                                        break;
                case 'PhoneNumber'  :   if(!preg_match('/[0-9]/', $fieldValue) || strlen($fieldValue) != 10)
                                            array_push($errList, $fieldName);
                                        else 
                                            $preparedData['PhoneNumber'] = $fieldValue;
                                        break;
                case 'Street'     :  
                                            $otherdata['Street'] = $fieldValue;
                                        break;
                case 'City'     :  
                                            $otherdata['City'] = $fieldValue;
                                        break;
                case 'State'     :  
                                            $otherdata['State'] = $fieldValue;
                                        break;
                case 'Zipcode'     :  
                                            $otherdata['Zipcode'] = $fieldValue;
                                        break;
                case 'Country'     :  
                                            $otherdata['Country'] = $fieldValue;
                                        break;
                }
        }
        Fetchdata::add('users',$preparedData);
        $email = $_POST['Email']; 
        $userData =  Fetchdata::getAll('users',"WHERE Email = '$email'");
       
        if($userData)
        {   
            
            $userid = $userData[0]['user_id'];
            $_SESSION['user_id'] = $userid;
            $otherdata['user_id'] = $userid;
            Fetchdata::add('user_addresses',$otherdata);
        }
         
    }
    public function service()
    {
        view::renderTemplate('vehicleservice/index.html');
    }
    public function serviceData()
    {
        $_POST['user_id'] = 3;
        Fetchdata::addService('service_registrations',$_POST);
    }
    public function displayService()
    {
       $result =  Fetchdata::getAll('service_registrations',"WHERE user_id = 3");
        
       view::renderTemplate('displayService/index.html',['data'=>$result]);
    }
    }
?>