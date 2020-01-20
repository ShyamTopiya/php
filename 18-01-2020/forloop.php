<?php

for ($i = 0; $i < 5; $i++) {
    echo $i . "<br>";
}


for ($i = 0; $i < 5; $i++) {
    for ($j = 0; $j < $i; $j++) {
        echo "*";
    }
    echo "<br>";
}

for ($i = 0; $i < 5; $i++) {
    for ($j = $i; $j < 5; $j++) {
        echo "*";
    }
    echo "<br>";
}

echo "<br><br>";

for ($i = 1; $i < 5; $i++) {

    for ($j = $i; $j < 5; $j++) {
        echo '&nbsp ';
    }

    for ($k = 1; $k <= ($i * 2) - 1; $k++) {
        echo "*";
    }
    echo "<br>";
}

for ($i = 5; $i >= 1; $i--) {

    for ($j = 5; $j > $i; $j--) {
        echo '&nbsp ';
    }

    for ($k = 1; $k <= ($i * 2) - 1; $k++) {
        echo "*";
    }
    echo "<br>";
}
?>