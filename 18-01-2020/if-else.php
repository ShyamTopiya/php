<?php
$password = "password";
$value1 = 10;
$value2 = '10';

if(1)
{
    echo "always true";
}
else {
    echo "false";
}
echo "<br><br>";

if($password == "password"){
echo "correct password";
}
else{
echo "password is not correct";
}

echo "<br><br>";

if($value1 <10)
{
    echo "you are child";
}
elseif($value1 <30)
{
    echo "you are Adult";
}
else{
    echo "you are old";
}
echo "<br><br>";

if($value1 == $value2)
{
    echo "equal";
}
echo "<br><br>";

if($value1 === $value2)
{
    echo "type equal";
}
else
{
    echo "Not equal";
}
echo "<br><br>";

?>