<?php
session_start();

function getValues($section,$fieldname,$returntype = "")
{
    return (isset($_SESSION[$section][$fieldname]) ? $_SESSION[$section][$fieldname] : $returntype );
}
function setSession($section)
{
    isset($_POST[$section]) ? $_SESSION[$section] = $_POST[$section] : [];
}
function getSession($section)
{
    return (isset($_SESSION[$section]) ? $_SESSION[$section] : []);
}
function validatekey($fieldname,$value)
{
    switch($fieldname)
    {
        case 'phoneNumber' : 
        case 'postalcode':
            return(!preg_match("/^[0-9]*$/",$value)) ? 0 : 1;
            break;
        case 'emailId':
            return (!filter_var($fieldname, FILTER_VALIDATE_EMAIL)) ? 0 : 1;
            break;
        default :
            return 1;

    }
}
function validateSection($section)
{   
    $error = [];
    foreach($_POST[$section] as $key=>$value)
    {
        if(!empty($value))
        {
            if(validateKey($key,$value) == 0)
            {
                echo "please Enter valid ".$key;
                array_push($error,$key);
                print_r($error) ;
            }
        }
        else{
             echo "please fill the form first";
        break;
        }
    }
    if(empty($error))
    {
        setSession('account'); 
        setSession('address-info');    
    }
}
if(isset($_POST['submit']))
{
    validateSection('account');
    validateSection('address-info');
    setSession('other-info');
}
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
?>