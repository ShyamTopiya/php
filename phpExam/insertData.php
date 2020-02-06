<?php 
require_once "connection.php";
require_once "validation.php";

$userCleanData = prepareAccountData();

function insertData($userCleanData, $tableName) {
    global $conn;
    $tablefields = implode(",", array_keys($userCleanData));
    $tableValues = "'" . implode("','", array_values($userCleanData)) . "'";

    $insert = "insert into $tableName ($tablefields) values ($tableValues)";
    
    return (mysqli_query($conn, $insert) == 1 ) ? mysqli_insert_id($conn) : mysqli_error($conn);
}
?>