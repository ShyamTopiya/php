<?php

$number1 = 1;
$number2 = 5;

echo "original number<br>".$number1."<br>".$number2."<br>";

$number1 = $number1+$number2;
$number2 = $number1-$number2;
$number1 = $number1-$number2; 

echo "after swap<br>".$number1."<br>".$number2;
?>