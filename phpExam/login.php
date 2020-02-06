<?php

require_once "connection.php";
require_once "validation.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log in</title>
</head>

<body>
    <h1>Log In</h1>
    <form action="login.php" method="POST">
        <label for="">UserName</label>
        <input type="text" name="userName"><br><br>
        <label for="">Password</label>
        <input type="password" name="password"><br><br>
        <input type="submit" value="Login" name="login">
    </form>
</body>

</html>