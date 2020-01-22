<?php

$numberArray = array(2,50,1,15,5);

for($i=1;$i<4;$i++)
{
    if($numberArray[0]<$numberArray[$i])
    {
        $numberArray[0] = $numberArray[$i];
    }
}
echo $numberArray[0];

?>