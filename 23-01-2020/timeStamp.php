<?php

$time = time();
$currentTime = date('D, d M Y @ H:i:s',$time);

echo "current time is ".$currentTime." in ".date_default_timezone_get();
 
echo "<br>for leap year ".date('L');

echo "<br>The day of the year is ".date('z');

echo "<br>current time zone is ".date('e');

date_default_timezone_set("Asia/kolkata");

echo "<br>current time in ".date_default_timezone_get()." is ".date('H:i:s');

?>