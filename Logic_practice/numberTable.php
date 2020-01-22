
<?php

echo "<table border=1px solid black>";
for($i=1;$i<7;$i++)
{
    echo "<tr>";
    for($j=1;$j<6;$j++)
    {
        echo "<td>".$i."*".$j."=".($i*$j)."</td>";
    }
    echo "</tr>";

}

echo "</table>"



?>