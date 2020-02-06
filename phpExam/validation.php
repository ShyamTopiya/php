<?php
require_once "connection.php";

session_start();
$errList = [];


function prepareAccountData()
{
    $preparedData = [];
    global $errList;
    foreach ($_POST as $fieldName => $fieldValue) {
        switch ($fieldName) {
            case 'prefix':
                $preparedData['prefix'] = $fieldValue;
                break;
            case 'firstName':
                if (!preg_match('/^[a-zA-Z]*$/', $fieldValue))
                    array_push($errList, $fieldName);
                else
                    $preparedData['firstName'] = $fieldValue;
                break;
            case 'lastName':
                if (!preg_match('/^[a-zA-Z]*$/', $fieldValue))
                    array_push($errList, $fieldName);
                else
                    $preparedData['lastName'] = $fieldValue;
                break;
            case 'password':
                if ($fieldValue !== $_POST['cpassword'])
                    array_push($errList, $fieldName);
                else
                    $preparedData['password'] = $fieldValue;
                break;
            case 'email':
                if (!filter_var($fieldValue, FILTER_VALIDATE_EMAIL))
                    array_push($errList, $fieldName);
                else
                    $preparedData['email'] = $fieldValue;
                break;
            case 'phoneNumber':
                if (!preg_match('/[0-9]/', $fieldValue) || strlen($fieldValue) != 10)
                    array_push($errList, $fieldName);
                else
                    $preparedData['mobileNumber'] = $fieldValue;
                break;
            case 'information':
                $preparedData['information'] = $fieldValue;
                break;
        }
    }

    return $preparedData;
}
function findParentKey($parentName)
{
    global $conn;
    $sql = "SELECT * FROM parentcategory WHERE title = '$parentName'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_assoc($result);
        $parentId = $row['parent_id'];
    }
    return $parentId;
}
function preparecategory()
{
    $preparedData = [];
    global $errList;

    echo "<br>";
    foreach ($_POST as $fieldName => $fieldValue) {
        switch ($fieldName) {
            case 'title':
                $preparedData['title'] = $fieldValue;
                break;
            case 'content':
                $preparedData['content'] = $fieldValue;
                break;
            case 'URL':
                $preparedData['url'] = $fieldValue;
                break;
            case 'metaTitle':
                $preparedData['metaTitle'] = $fieldValue;
                break;
            case 'parentCategory':
                $parentId = findParentKey($fieldValue);
                $preparedData['parent_category_id'] = $parentId;
                $preparedData['parent_name'] = $fieldValue;
                break;
        }
    }

    $uploadfolder = 'uploads/';
    $uploadImage = $uploadfolder . basename($_FILES['categoryImage']['name']);
    if (move_uploaded_file($_FILES['categoryImage']['tmp_name'], $uploadImage))
        echo "image uploaded<br>";
    else
        echo "error";
    $preparedData['categoryImage'] = $uploadfolder . $_FILES['categoryImage']['name'];

    return $preparedData;
}

function prepareBlog()
{
    $preparedData = [];
    global $errList;

    echo "<br>";
    foreach ($_POST as $fieldName => $fieldValue) {
        switch ($fieldName) {
            case 'title':
                $preparedData['title'] = $fieldValue;
                break;
            case 'content':
                $preparedData['content'] = $fieldValue;
                break;
            case 'URL':
                $preparedData['url'] = $fieldValue;
                $preparedData['published_at'] = $fieldValue;
                break;
            case 'parentCategory':
                if (is_array($fieldValue))
                    $preparedData['parent_name']  = implode(",", $fieldValue);
                else
                    $preparedData['parent_name'] = $fieldValue;
                break;
            case 'publishedAt':
                $preparedData['published_at'] = $fieldValue;
                break;
        }
    }

    $uploadfolder = 'uploads/';
    $uploadImage = $uploadfolder . basename($_FILES['categoryImage']['name']);
    if (move_uploaded_file($_FILES['categoryImage']['tmp_name'], $uploadImage))
        echo "image uploaded<br>";
    else
        echo "error";
    $preparedData['categoryImage'] = $uploadfolder . $_FILES['categoryImage']['name'];

    return $preparedData;
    print_r($preparedData);
}


function insertData($data, $tableName)
{
    global $conn;
    $tablefields = implode(",", array_keys($data));
    $tableValues = "'" . implode("','", array_values($data)) . "'";

    $insertQuery = "insert into $tableName ($tablefields) values ($tableValues)";
    echo $insertQuery;
    return (mysqli_query($conn, $insertQuery) == 1) ? mysqli_insert_id($conn) : mysqli_error($conn);
}

function deleteRecord($tableName, $condition)
{
    global $conn;
    $deleteQuery = "delete from $tableName where $condition";
    return (mysqli_query($conn, $deleteQuery) == 1) ? 1 : mysqli_error($conn);
}




if (isset($_POST['register'])) {
    $UsercleanData = prepareAccountData();

    $username = $_POST['email'];
    $firstName = $_POST['firstName'];
    if (empty($errList)) {
        $sql = "SELECT * FROM user where email = '$username'";

        $result = $conn->query($sql);
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_assoc($result);
            if ($row['email'] === $username) {
                echo  "User already exist with this name, please use another username";
            }
        } else {
            $_SESSION['email'] = $username;
            $_SESSION['firstName'] = $firstName;
            insertData($UsercleanData, 'user');
            header("location: dashboard.php");
        }
    } else {
        echo "Enter valid field details";
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

    $query = "SELECT * FROM user WHERE email='$username'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $username;
        $_SESSION['firstName'] = $row['firstName'];
        header("location: dashboard.php");
    } else {
        echo "Wrong username and password";
    }
}

if (isset($_POST['addCategory'])) {

    $UsercleanData = preparecategory();

    insertData($UsercleanData, 'category');
    header("location: categoryGrid.php");
}
if (isset($_POST['addblog'])) {

    $UsercleanData = prepareBlog();

    insertData($UsercleanData, 'blog_post');
    header("location: blogGrid.php");
}
?>