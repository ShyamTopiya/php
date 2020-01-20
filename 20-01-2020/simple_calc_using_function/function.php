<?php



$userSelectedValue = $_GET['userInput'];
$user1stValue = $_GET['user1stValue'];
$user2ndValue = $_GET['user2ndValue'];


function add()
{
    global $user1stValue ,$user2ndValue ;
    echo "Addition of 2 number is<br>".($user1stValue +$user2ndValue );
}

function subtract()
{
    global $user1stValue ,$user2ndValue ;
    echo "Subtraction of 2 number is<br>".($user1stValue -$user2ndValue) ;
}

function multiply()
{
    global $user1stValue ,$user2ndValue ;
    echo "Multiply of 2 number is<br>".($user1stValue *$user2ndValue) ;
}

function devide()
{
    global $user1stValue ,$user2ndValue ;
    echo "devision of 2 number is<br>".($user1stValue /$user2ndValue);
}

switch($userSelectedValue)
{
    case 1:
        add();
    break;
    case 2:
        subtract();
    break;
    case 3:
        multiply();
    break;
    case 4:
        devide();
    break;
    default:
        echo "invalid Choice";
}
?>


