<?php
namespace app\model;
use PDO;
use PDOException;

class AddPost extends \core\Model
{
    public static function addPost($value)
    {
        try
            {
                $db = static::getDB();

                $tablefields = implode(",", array_keys($_POST));
                $tableValues = "'" . implode("','", array_values($_POST)) . "'";

                $stmt = "INSERT INTO posts ($tablefields) VALUES ($tableValues)";
                $db->exec($stmt);

                echo "<script>
                        alert('post added successfully');
                        window.location.replace('/cybercom/php/MVC/public/posts/index');
                    </script>";
    
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public static function editPost($value ="")
        {
            try
                {
                    $db = static::getDB();

                    $stmt = "SELECT * FROM posts WHERE id='$value'";
                    $stmt = $db->query($stmt); 
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
               
                    return $result;
        
                }catch(PDOException $e){
                    echo $e->getMessage();
                }
            }

            public static function updatepost($value ="")
            {
                try
                {
                    $db = static::getDB();

                     foreach ($_POST as $key => $val) {
                            $userData[] = "$key = '$val '";
                        }
                    $sql = "UPDATE posts SET " . implode(', ', $userData) . " WHERE id = '$value'";       
                    $db->exec($sql);
                    echo "<script>
                    alert('post updated successfully');
                    window.location.replace('/cybercom/php/MVC/public/posts/index');
                </script>";
                }
                catch(PDOException $e){
                    echo $e->getMessage();
                }   
            }

            public static function deletepost($value ="")
            {
                try
                    {
                        $db = static::getDB();
    
                        $stmt = "DELETE FROM posts WHERE id='$value'";
                        $db->exec($stmt);
                    echo "<script>
                    alert('post deleted successfully');
                    window.location.replace('/cybercom/php/MVC/public/posts/index');
                </script>";
            
                    }catch(PDOException $e){
                        echo $e->getMessage();
                    }
                }
    }
        

?>