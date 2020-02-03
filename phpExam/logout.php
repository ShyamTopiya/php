<?php 
require_once "connection.php";
session_start();
session_destroy();
echo "logged out successfully";
echo "<a href='login.php'>Log In Again</a>";
?>


