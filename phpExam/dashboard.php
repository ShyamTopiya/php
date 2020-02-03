<?php
require_once "connection.php";
session_start();
if(isset($_SESSION['email']))
{
    echo "hello".$_SESSION['email'];
}
else
{
    header("location: login.php");
}
?>
<html>
    <body>
        <form action="logout.php" method="POST">
            <input type="submit" value="logout" name="logout">
        </form>
    </body>
</html>

