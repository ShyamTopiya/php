<?php
namespace app\model;
use PDO;
use PDOException;

class Addcms extends \core\Model
{
    public static function addCms($value="")
    {
        try
            {
                $db = static::getDB();

                $tablefields = implode(",", array_keys($_POST));
               $finalArray = [];
                foreach($_POST as $value)
                {
                    if($value != 'Null')
                {
                    $finalArray[] = "'".$value."'";  
                }
                else
                {
                    $finalArray[] = $value;
                }
            }
                $tableValues = implode(',',$finalArray);
                
                
                
                
                $stmt = "INSERT INTO cms_pages ($tablefields) VALUES ($tableValues)";
                echo $stmt;
                $db->exec($stmt);

                 echo "<script>
                         alert('product added successfully');
                         window.location.replace('/cybercom/php/productMvc/public/admin/showCms');
                     </script>";
    
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public static function editCms($value ="")
        {
            try
                {
                    $db = static::getDB();

                    $stmt = "SELECT * FROM cms_pages WHERE id='$value'";
                    $stmt = $db->query($stmt); 
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
               
                    return $result;
        
                }catch(PDOException $e){
                    echo $e->getMessage();
                }
            }

            public static function updateCms($value ="",$data)
            {
                try
                {
                    $db = static::getDB();
                    echo "<pre>";
                    print_r($data);
                     foreach ($data as $key => $val) {
                         if($val == 'Null')
                            $userData[] = "$key = $val";
                         else
                            $userData[] = "$key = '$val '";
                        }
                    $sql = "UPDATE cms_pages SET " . implode(', ', $userData) . " WHERE id = '$value'";  
                      echo $sql;
                    $db->exec($sql);
                     echo "<script>
                     alert('category updated successfully');
                     window.location.replace('/cybercom/php/productMvc/public/admin/showCms');
                 </script>";
                }
                catch(PDOException $e){
                    echo $e->getMessage();
                }   
            }

            public static function deleteCms($value ="")
            {
                try
                    {
                        $db = static::getDB();
    
                        $stmt = "DELETE FROM cms_pages WHERE id='$value'";
                        $db->exec($stmt);
                    echo "<script>
                    alert('category deleted successfully');
                    window.location.replace('/cybercom/php/productMvc/public/admin/showCms');
                </script>";
            
                    }catch(PDOException $e){
                        echo $e->getMessage();
                    }
                }
    }
        

?>