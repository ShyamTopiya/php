<?php

$number = 13;
$counter = 0;
for($i=1;$i<=$number;$i++)
{
    if($number%$i == 0)
    {
        $counter++;
    }
}
    if($counter == 2)
    {
        echo "number is prime";
    }
    else{
        echo "number is not prime";
    }



?>