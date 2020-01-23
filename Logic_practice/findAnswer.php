<?php
$temp = 0;
echo "<table border=1px solid black>";
for($i=0;$i<=7;$i++)
{
    echo "<tr>";
    for($j=0;$j<=7;$j++)
    {
        if($j==0 || $j==7 || $j == $temp || $j == 7-$temp)
        {
        echo "<td>*</td>";
        }
        else{
            echo "<td>&nbsp;</td>";
        }
    }
    $temp++;
    echo "</tr>";
}
echo "</table>";


?>