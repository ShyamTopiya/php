<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
    <body>
        <h1>Welcome</h1>
        <p>Hello<?php echo htmlspecialchars($name);?>!</p>
        <ul>
            <?php foreach($hobby as $value):?>
                <li><?php echo htmlspecialchars($value);?></li>
            <?php endforeach;?>
        </ul>
        
    </body>
</html>