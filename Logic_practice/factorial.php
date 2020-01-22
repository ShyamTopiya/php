<?php

$number = 5;
$fact = 1;
if ($number < 0)
echo "Error";
else {
for ($i = 1; $i <= 5; $i++) {
    $fact *= $i;
}
echo "factorial of 5 is ".$fact;
}


?>