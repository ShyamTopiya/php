<?php

$number = 10;
echo "factor of 10 is:<br>";
for($i=1;$i<=$number;$i++)
{
    if($number%$i == 0)
    {
       echo $i."<br>";
    }
}

?>