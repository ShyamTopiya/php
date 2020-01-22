<?php

$firstNumber = 0;
$secondnumber = 1;
echo "0<br>1<br>";
for($i=0;$i<10;$i++)
{
    
    $addition =  $firstNumber + $secondnumber;
    echo $addition."<br>";
    $firstNumber = $secondnumber;
    $secondnumber = $addition;
}



?>