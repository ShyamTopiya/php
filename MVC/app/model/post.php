<?php
namespace app\model;
use PDO;
use PDOException;

class post extends \core\Model
{
    public static function getAll()
    {
        try
            {
                $db = static::getDB();

                $stmt = $db->query('SELECT id,title,content FROM posts ORDER BY created_at');
    
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
               
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        } 
    }
        

?>