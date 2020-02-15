<?php
namespace app\model;
use PDO;
use PDOException;

class AddCategory extends \core\Model
{
    public static function addCategory($value="")
    {
        try
            {
                $db = static::getDB();

                $tablefields = implode(",", array_keys($_POST));
                $tableValues = "'" . implode("','", array_values($_POST)) . "'";
                
                
                $stmt = "INSERT INTO categories ($tablefields) VALUES ($tableValues)";
                echo $stmt;
                $db->exec($stmt);

                 echo "<script>
                         alert('product added successfully');
                         window.location.replace('/cybercom/php/productMvc/public/admin/showCategory');
                     </script>";
    
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public static function editCategory($value ="")
        {
            try
                {
                    $db = static::getDB();

                    $stmt = "SELECT * FROM categories WHERE category_id='$value'";
                    $stmt = $db->query($stmt); 
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
               
                    return $result;
        
                }catch(PDOException $e){
                    echo $e->getMessage();
                }
            }

            public static function updateCategory($value ="")
            {
                try
                {
                    $db = static::getDB();

                     foreach ($_POST as $key => $val) {
                            $userData[] = "$key = '$val '";
                        }
                    $sql = "UPDATE categories SET " . implode(', ', $userData) . " WHERE category_id = '$value'";  
                      
                    $db->exec($sql);
                     echo "<script>
                     alert('category updated successfully');
                     window.location.replace('/cybercom/php/productMvc/public/admin/showCategory');
                 </script>";
                }
                catch(PDOException $e){
                    echo $e->getMessage();
                }   
            }

            public static function deleteCategory($value ="")
            {
                try
                    {
                        $db = static::getDB();
    
                        $stmt = "DELETE FROM categories WHERE category_id='$value'";
                        $db->exec($stmt);
                    echo "<script>
                    alert('category deleted successfully');
                    window.location.replace('/cybercom/php/productMvc/public/admin/showCategory');
                </script>";
            
                    }catch(PDOException $e){
                        echo $e->getMessage();
                    }
                }
    }
        

?>