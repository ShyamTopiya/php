<?php
$offset = 0;
$string = $_GET['stringByUser'];
$find = $_GET['whichFind'];
$replace = $_GET["forReplace"];
$string_position = strpos($string,$find,$offset);

$find_length = strlen($find);

if(isset($_GET['find']))
{
    echo "Your String is: ".$string."<br>";
    if($string_position !== false)
    {
    do
    {
        echo "<strong>".$find."</strong>&nbsp&nbspfound at position&nbsp&nbsp<strong>".$string_position."</strong><br>";
        $offset = $string_position + $find_length;
    }
    while($string_position = strpos($string,$find,$offset));
}
else{
    echo "no match found";
}
}

if(isset($_GET['find&replace']))
{
    echo "Your original String is: ".$string."<br>";
    if($string_position !== false)
    {
    $new_string = str_replace($find,$replace,$string);
    echo "Your new string is:&nbsp&nbsp<strong>".$new_string."</strong>";
    }
    else{
        echo "no match found";
    
    }
}
