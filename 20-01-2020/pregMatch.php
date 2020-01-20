<?php

$string = "i am Shyam";
$emailpattern = "abc@gmail.com";

if(preg_match("/am/",$string))
    echo "match found";
else
echo "Match not found";
echo "<br><br>";
if(preg_match("/^[a-zA-Z ]*$/",$emailpattern))
{
    echo "valid email address";
}
else
    echo "invalid email address";
?>