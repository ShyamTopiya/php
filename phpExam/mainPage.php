<?php
session_start();
if (!isset($_SESSION['userName'])) {
    $_SESSION['msg'] = "You need to logged-in first to view to this page";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['userName']);
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Main page</title>
</head>

<body>
    <div class="main">
        <div class="varify">
            <?php if (isset($_SESSION['username'])) : ?>
                <h4>Welcome, <?php echo $_SESSION['username']; ?></h4>
                <a href="mainPage.php?logout='1'">Logout</a>
            <?php endif; ?>
        </div>
        <div class="nav">
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="addStudent.php">Add Student</a></li>
                <li><a href="showStudent.php">Show student</a></li>
                <li><a href="#about">About Us</a></li>
            </ul>
        
        </div>

    </div>
</body>

</html>