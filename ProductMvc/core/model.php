<?php
namespace core;
use PDO;
use PDOException;

abstract class Model
{
    protected static function getDB()
    {
        static $db = null;

        if($db === Null)
        {
            $host = 'localhost';
            $dbname = "productmvc";
            $username = "root";
            $password = "";
    
            try
            {
                $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$username,$password);
                return $db;
              
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        else{
            return $db;
        } 
    }
}


?>