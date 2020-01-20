<?php

$string = "My name is Shyam Topiya & i am an engineer";

$string_word_count = str_word_count($string,2,"&");

$string_suffled = str_shuffle($string);

$sub_string = substr($string_suffled,0,10); 

$string_reversed = strrev($string);

$string_length = strlen($string); 

print_r($string_word_count);
echo "<br><br>".$string_suffled;
echo "<br><br>subString is: ".$sub_string;
echo "<br><br>Reversed String Is: ".$string_reversed;
echo "<br><br>".$string_length."<br><br>";
echo trim($string,"Myineer");

?>