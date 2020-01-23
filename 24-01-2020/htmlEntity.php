
<form action="htmlEntity.php" method="POST">

<input type="text" placeholder="Enter Your Name" name="username"><br><br>

<input type="password" placeholder="Enter Your Password" name="password"><br><br>

<input type="submit" value="submit" name="submit">
</form>

<?php

if(isset($_POST['submit']))
{
    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);
    echo "<hr>";
    if(!empty($username) && !empty($password))
    {
        echo "Hiii ".$username;
    }
    else
    {
        echo "Please fill all the fields";
    }
}

?>