<?php
namespace app\model;
use PDO;
use PDOException;

class AddProducts extends \core\Model
{
    public static function addProduct($value="")
    {
        try
            {
                $db = static::getDB();

                $tablefields = implode(",", array_keys($_POST));
                $tableValues = "'" . implode("','", array_values($_POST)) . "'";
                
                
                $stmt = "INSERT INTO products ($tablefields) VALUES ($tableValues)";
                echo $stmt;
                $db->exec($stmt);

                 echo "<script>
                         alert('product added successfully');
                         window.location.replace('/cybercom/php/productMvc/public/admin/showProduct');
                     </script>";
    
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public static function editProduct($value ="")
        {
            try
                {
                    $db = static::getDB();

                    $stmt = "SELECT * FROM products WHERE id='$value'";
                    $stmt = $db->query($stmt); 
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
               
                    return $result;
        
                }catch(PDOException $e){
                    echo $e->getMessage();
                }
            }

            public static function updateProduct($value ="")
            {
                try
                {
                    $db = static::getDB();

                     foreach ($_POST as $key => $val) {
                            $userData[] = "$key = '$val '";
                        }
                    $sql = "UPDATE products SET " . implode(', ', $userData) . " WHERE id = '$value'";  
                      
                    $db->exec($sql);
                     echo "<script>
                     alert('product updated successfully');
                     window.location.replace('/cybercom/php/productMvc/public/admin/showProduct');
                 </script>";
                }
                catch(PDOException $e){
                    echo $e->getMessage();
                }   
            }

            public static function deleteProduct($value ="")
            {
                try
                    {
                        $db = static::getDB();
    
                        $stmt = "DELETE FROM products WHERE id='$value'";
                        $db->exec($stmt);
                    echo "<script>
                    alert('product deleted successfully');
                    window.location.replace('/cybercom/php/productMvc/public/admin/showProduct');
                </script>";
            
                    }catch(PDOException $e){
                        echo $e->getMessage();
                    }
                }
    }
        

?>