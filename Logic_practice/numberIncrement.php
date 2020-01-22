
<?php
$counter = 1;
echo "<table border=1px solid black>";
for($i=1;$i<11;$i++)
{
    echo "<tr>";
    for($j=1;$j<11;$j++)
    {
        echo "<td>".$counter."</td>";
        $counter++;
    }
    echo "</tr>";

}

echo "</table>"



?>