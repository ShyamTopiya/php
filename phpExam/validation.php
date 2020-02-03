<?php
require_once "connection.php";

session_start();
if(isset($_POST['form']))
    {
        echo "haha";
        $formData = $_POST['form'];
    }
$errList = [];
$formData = [];
    
    
        function prepareAccountData() {
            $preparedDataArr = [];
           global $errList;
           foreach($_POST['form'] as $fieldName => $fieldValue) {
               switch($fieldName) {
                   case 'prefix'       :   $preparedData['prefix'] = $fieldValue;
                                           break;
                   case 'firstName'    :   if(!preg_match('/^[a-zA-Z]*$/', $fieldValue))
                                               array_push($errList, $fieldName);
                                           else
                                               $preparedData['firstName'] = $fieldValue;
                                           break;
                   case 'lastName'     :   if(!preg_match('/^[a-zA-Z]*$/', $fieldValue))
                                               array_push($errList, $fieldName);
                                           else
                                               $preparedData['lastName'] = $fieldValue;
                                           break;
                   case 'userpassword'     :   if($fieldValue !== $_POST['userpassword']['cpassword'])
                                               array_push($errList, $fieldName);
                                           else    
                                               $preparedData['password'] = $fieldValue;
                                           break;
                   case 'email' :   if(!filter_var($fieldValue, FILTER_VALIDATE_EMAIL)) 
                                               array_push($errList, $fieldName);
                                           else
                                               $preparedData['email'] = $fieldValue;
                                           break;
                   case 'phoneNumber'  :   if(!preg_match('/[0-9]/', $fieldValue) || strlen($fieldValue) != 10)
                                               array_push($errList, $fieldName);
                                           else 
                                               $preparedData['phoneNumber'] = $fieldValue;
                                           break;
                   }
           }
           return $preparedDataArr;
       }
    
    
    function insertData($data, $tableName) {
        global $conn;
        $tablefields = implode(",", array_keys($data));
        $tableValues = "'" . implode("','", array_values($data)) . "'";

        $insertQuery = "insert into $tableName ($tablefields) values ($tableValues)";
      
        return (mysqli_query($conn, $insertQuery) == 1 ) ? mysqli_insert_id($conn) : mysqli_error($conn);
    } 

$UsercleanData = prepareAccountData();


    if(isset($_POST['register']))
    {
      print_r($_POST['form']);
        $username = $_POST['email'];
        
        $sql = "SELECT * FROM user where email = '$username'";
      
        $result = $conn->query($sql);
        if (mysqli_num_rows($result)) {
                $row = mysqli_fetch_assoc($result);
                if ($row['email'] === $username) 
                {
                    echo  "User already exist with this name, please use another username";
                }   
                else
                {
                $_SESSION['email'] = $username;
               // insertData($cleanData,$tableName);
                }
                
    }
}   
        

        if (isset($_POST['login'])) {

           
    
            $username = $_POST['userName'];
            $password = $_POST['password'];
        
            if (empty($username)) {
                echo "Please enter a username";
            }
            if (empty($password)) {
                echo "Please enter a password";
            }
            
            $query = "SELECT * FROM user WHERE email='$username' AND password='$password'";
        
            $result = mysqli_query($conn, $query);
        
            if (mysqli_num_rows($result)) {
                $row = mysqli_fetch_assoc($result);
                echo $row['email'];
                  $_SESSION['email'] = $username;
                  header("location: dashboard.php"); 
            } else {
            echo "Wrong username and password";
            }
        }
?>