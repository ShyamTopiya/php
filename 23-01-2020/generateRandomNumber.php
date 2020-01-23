<form action="generateRandomnumber.php" method="POST">
    <input type="text" placeholder="Guess a number between 1 to 100" name="userinput" style="width:250px" ;><br><br>
    <input type="submit" value="submit" name="submit">
</form>

<?php

if (isset($_POST['submit'])) {
    $userInput = $_POST['userinput'];

    $rand = rand(1, 100);
    echo "<hr>";
    if ($userInput == 13) {
        echo "u r winner";
    } 
    else {
        echo "better luck next time";
    }
}

?>