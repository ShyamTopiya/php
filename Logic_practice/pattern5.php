<?php

for($i=1;$i<5;$i++)
{
    $temp = $i;
        
    for($j=1;$j<4;$j++)
    {
        echo "&nbsp".$temp."&nbsp";
        $temp = $temp+4;
    }
    echo "<br>";
}



?>