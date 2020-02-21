<?php
namespace app\model;
use PDO;
use PDOException;

class Fetchdata extends \core\Model
{
    public static function getAll($table,$condition="")
    {
        try
            {
                $db = static::getDB();

                $stmt = $db->query("SELECT * FROM $table $condition");
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                //echo "SELECT * FROM $table $condition";
                return $result;
               
                    
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        public static function add($table="",$value = [],$condition="")
        {
        try
            {
                $db = static::getDB();

                $tablefields = implode(",", array_keys($value));
                $tableValues = "'" . implode("','", array_values($value)) . "'";
                
                
                $stmt = "INSERT INTO $table ($tablefields) VALUES ($tableValues) $condition";
                 echo $stmt;
                  $db->exec($stmt);

                  echo "<script>
                          alert('user added successfully');
                          window.location.replace('/cybercom/php/vehicalregistration/public');
                      </script>";
    
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        
        public static function updateProduct($value,$id,$product_id)
        {
            try
            {
                $db = static::getDB();
                
                $sql = "UPDATE usercart SET quntity = $value WHERE user_id = '$id' AND product_id = '$product_id'";  
                  echo $sql;
                $db->exec($sql);
                 
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }   
        }
        public static function deleteProduct($value ="",$userid)
            {
                try
                    {
                        $db = static::getDB();
    
                        $stmt = "DELETE FROM usercart WHERE product_id=$value AND user_id = $userid";
                       
                        $db->exec($stmt);
                  
            
                    }catch(PDOException $e){
                        echo $e->getMessage();
                    }
                } 
                public static function addService($table="",$value = [],$condition="")
                {
                try
                    {
                        $db = static::getDB();
        
                        $tablefields = implode(",", array_keys($value));
                        $tableValues = "'" . implode("','", array_values($value)) . "'";
                        
                        
                        $stmt = "INSERT INTO $table ($tablefields) VALUES ($tableValues) $condition";
                        
                          $db->exec($stmt);
                          echo "<script>
                          alert('user added successfully');
                          window.location.replace('/cybercom/php/vehicalregistration/public/user/displayService');
                      </script>";
            
                    }catch(PDOException $e){
                        echo $e->getMessage();
                    }
                }
    }
        

?>