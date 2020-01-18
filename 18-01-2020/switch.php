<?php

$number = 1;
$day = "sunday";

switch($number)
{
case 1:
    echo "one";
break;
case 2:
    echo "two";
break;
case 3:
    echo "three";
break;
default:
    echo "number isgreater than three";
}
echo "<br><br>";


switch($day)
{
case "sunday":
case "saturday":
    echo "today is holiday";
break;
default:
    echo "there is no holiday today";
}
?>