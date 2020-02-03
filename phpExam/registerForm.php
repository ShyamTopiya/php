<?php

require_once "connection.php";

require_once "validation.php";


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Regostration Form</title>
    <style>
        label{
            display:inline-block;
            width : 150px;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Registration Form</h1>
    <form action="registerForm.php" method="POST" name="form">

    <div class="userData">
        <div class="userData">
        <label>Prefix</label>
        <?php $prefix = ['Mr','Mrs','Dr','Er']?>
        <select name="prefix">
        <?php foreach($prefix as $items) :?>
            <option name="prefix" value="<?php echo $items;?>" >
            <?php echo $items;?></option>
        <?php endforeach;?>
        </select>
        </div><br>
        <div class="firstName">
                    <label>firstName</label>
                    <input type="text" name="firstName">
                </div><br>
                <div class="lastName">
                    <label>lastName</label>
                    <input type="text" name="lastName">
                </div><br>
                
                <div class="phoneNumber">
                    <label>phone Number</label>
                    <input type="tel" name="phoneNumber" maxlength="10">
                </div><br>
                <div class="email">
                    <label>Email</label>
                    <input type="email" name="email">
                </div><br>
                <div class="password">
                    <label>Password</label>
                    <input type="password" name="password">
                </div><br>
                <div class="cpassword">
                    <label>Confirm Password</label>
                    <input type="password" name="cpassword">
                </div><br>
                 <div class="information">
                    <label>information</label>
                    <textarea name="information" cols="30" rows="3"></textarea>
                </div><br>
                <div class="terms&condition">
                <input type="checkbox" name="terms">
                   <span>Herby,I accept Terms & Conditions.</span>
                </div><br>
                <input type="submit" value="submit" name="register">

    </form>
</body>
</html>
