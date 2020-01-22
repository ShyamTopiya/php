
<?php
error_reporting(0);
$string1 = "JOHN";
$string2 = "SMITH";

if(strlen($string1)>strlen($string1))
{
    $length = strlen($string1);
}
else
{
    $length = strlen($string2);
}
for($i=0;$i<$length;$i++)
{
    echo $string1[$i].$string2[$i];
}
?>