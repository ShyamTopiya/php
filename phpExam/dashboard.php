<?php
require_once "connection.php";
require_once "header.php";
session_start();
if(isset($_SESSION['email']))
{
    echo "<h2>hiii&nbsp&nbsp".$_SESSION['firstName']."</h2>";
}
else
{
    header("location: login.php");
}
?>

