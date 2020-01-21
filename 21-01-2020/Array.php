<?php

//----------------------Simple Array-----------------------

$food = array("Pizza","Burger","salad");

echo "I like".$food[0].",".$food[1].",".$food[2]."<br><br>";
print_r($food);

echo "<br><br>Expensive Items:-<br>";
$items = array("Mobile","Laptop","Tablet","ipad","PC");
$arrayLength = count($items);

for($i=0;$i<$arrayLength;$i++)
{
    echo $items[$i]."<br>";

}

//---------------------Associative Array-------------------

$laptopPrice = array("Dell"=>30000,"Lenovo"=>35000,"HP"=>32000,"Apple"=>80000);
echo "<br>Price of Dell Laptop<br>";
echo $laptopPrice["Dell"];
echo "<br><br>";

//-------------------Nested Array--------------------------

$vehicle = array("Bikes"=>array("splendar","platina","pulsar"),
                "Cars"=>array("BMW","Audi","Swift"));

                foreach($vehicle as $item=>$name)
                {
                    echo "<strong>".$item."</strong><br>";
                    foreach($name as $name)
                    {
                        echo $name."<br>";
                    }
                }

//-----------------2d Array---------------------------------

$foods = array(array("Pizza","junky",400),
                array("salad","healthy",100),
                array("burger","junky",150),
                array("vegetables","healthy",100),
                );

                for($i=0;$i<4;$i++)
                {
                    echo "<br>Item No: ".($i+1);
                    echo "<ul>";
                    for($j=0;$j<3;$j++)
                    {
                        echo "<li>".$foods[$i][$j]."</li>";
                    }
                    echo "</ul>";
                }
?>
