<form action="getvariable.php" method="GET">
    <h1>Log in Page</h1>
    <input type="text" placeholder="Enter Your username" name="username"><br><br>
    <input type="password" placeholder="Enter your password" name="password"><br><br>
    <input type="submit" value="login" name="submit">

</form>

<?php

if (isset($_GET['submit'])) {
    $username = $_GET['username'];
    $password = $_GET['password'];
    if (!empty($username) && !empty($password)) {
        echo "<hr>";
        echo "Welcome " . $username;
        echo "<br>Your password is " . $password;
    } else {
        echo "Please Fill all the fields first";
    }
}


?>