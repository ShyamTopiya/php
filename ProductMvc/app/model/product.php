<?php
namespace app\model;
use PDO;
use PDOException;

class Product extends \core\Model
{
    public static function getAll($table,$condition="")
    {
        try
            {
                $db = static::getDB();

                $stmt = $db->query("SELECT * FROM $table $condition ORDER BY createdAt");
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                 return $result;
                    
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        } 

        public static function getCategory()
        {
        try
            {
                $db = static::getDB();

                $stmt = $db->query("SELECT
                p.category_id,
                p.categoryName as parentName,
                GROUP_CONCAT(c.categoryName) childName
                 FROM
                categories as p 
                LEFT JOIN 
                categories as c 
                ON
                p.category_id = c.parent_id
                WHERE p.parent_id IS NULL
                GROUP BY p.categoryName");
               
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                 return $result;
                    
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        } 
    }
        

?>