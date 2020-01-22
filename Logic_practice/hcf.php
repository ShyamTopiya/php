<?php

$number1 = 5;
$number2 = 10;
$temp = 0;

while($number2 != 0 && $number2 !=0)
{
    $temp = $number2;
    $number2 = $number1%$number2;
    $number1 = $temp;
}
echo $number1;
?>