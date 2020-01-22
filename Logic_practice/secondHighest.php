<?php

$numberArray = array(2,50,1,15,5);

for($i=0;$i<5;$i++)
{
    for($j=$i;$j<5;$j++)
    {
        if($numberArray[$i]<$numberArray[$j])
        {
            $temp = $numberArray[$j];
            $numberArray[$j] = $numberArray[$i]; 
            $numberArray[$i] = $temp;
        }
    }
}

echo $numberArray[1];

?>