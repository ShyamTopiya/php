
<?php

echo "<table border=1px solid black>";
for($i=0;$i<6;$i++)
{
    echo "<tr>";
    for($j=0;$j<6;$j++)
    {
        $total = $i+$j;
        if($total%2 == 0)
        {
            echo "<td height=40px width=40px bgcolor=black></td>";
        }
        else{
            echo "<td height=40px width=40px></td>";
        }
    }
    echo "</tr>";

}

echo "</table>"



?>