<?php

$number1 = 10;
$number2 = 5;

$highNumber = 0;

if($number1>$number2)
    $highNumber = $number1;
else
    $highNumber = $number2;

    while(1)
    {
        if($highNumber % $number1 == 0 && $highNumber % $number2 == 0)
        {
            echo $highNumber;
            break;
        }
        else
        $highNumber++;
    }

?>