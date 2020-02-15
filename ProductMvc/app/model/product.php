<?php
namespace app\model;
use PDO;
use PDOException;

class Product extends \core\Model
{
    public static function getAll($table)
    {
        try
            {
                $db = static::getDB();

                $stmt = $db->query("SELECT * FROM $table ORDER BY createdAt");
    
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        } 
    }
        

?>