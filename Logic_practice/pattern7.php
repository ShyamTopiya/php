<?php
$counter = 0;
for($i=0;$i<10;$i++)
{
    for($j=0;$j<$i;$j++)
    {
        echo "*";
    }
    for($k=0;$k<$j;$k++)
        {
            echo "0";
        }
    echo "<br>";
}



?>