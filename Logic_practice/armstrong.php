<?php
$originalNumber = 153;
$number = 153;
$answer = 0;
while($number!=0)
{
    $reminder = $number%10;
    $answer += $reminder*$reminder*$reminder;
    $number = $number/10;     
}

if($originalNumber == $answer)
{
    echo "number is armstrong";
}
else
{
    echo "number is not armstrong";
}

?>