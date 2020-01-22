<?php

$number = 123;
$temp = 0;

while($number >= 1)
{
    $temp = $temp*10;
    $temp = $temp+($number%10);
    $number = $number/10;
}
echo $temp;

?>