<form action="postVariable.php" method="POST">
    <h1>Log in Page</h1>
    <input type="text" placeholder="Enter Your username" name="username"><br><br>
    <input type="password" placeholder="Enter your password" name="password"><br><br>
    <input type="submit" value="login" name="submit">

</form>

<?php

if (isset($_POST['submit'])) 
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (!empty($username) && !empty($password)) 
    {
        if ($password == "abc")
            echo "Login Successfully";
        else
            echo "Login failed";
    } else 
        echo "Please Fill all the fields first";
}


?>