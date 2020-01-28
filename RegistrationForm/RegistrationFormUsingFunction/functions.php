<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";
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
if(isset($_POST['submit']))
{
    setSession('account');
    setSession('address-info');
    setSession('other-info');
}
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
?>