
<form action="calendar.php" method="POST">

<input type="number" placeholder="Enter month" name="month" max="12" min="1" style="width: 150px"><br><br>
<input type="number" placeholder="Enter year" name="year" min="2000" max="2030" style="width: 150px"><br><br>
<input type="submit" value="submit" name="submit">

</form>

<?php
session_start();

    
   
    
    extract($_POST);
    
    
    if(isset($month) && isset($year))
    {
        $_SESSION['month'] = $month;
        $_SESSION['year'] = $year;
        calendar($month,$year);
    }
        else if($_SESSION['month'] !== null && $_SESSION['year'] !== null)
          {
             calendar($_SESSION['month'],$_SESSION['year']);
          }
         
           
    function calendar($month,$year)
    {
        $dayArray = array('Sunday'=>0,'Monday'=>1,'Tuesday'=>2,'Wednesday'=>3,'Thursda'=>4,'Friday'=>5,'Saturday'=>6);
        
    
   
        echo "<table border=1px solid black>";
        echo "<tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr>";
        $counter = 1;
        $raw = 1;
        $daysOfMonth = cal_days_in_month(CAL_GREGORIAN, (int)$month,(int)$year);
        $firstDay = date("l", mktime(0,0,0,$month,1,$year));
        $currentDay = $dayArray[$firstDay];
    for($i=1;$i<=$daysOfMonth;$i++)
    {
        if($currentDay < 7)
        {
        for($j=0;$j<$currentDay;$j++)
        {
              echo "<td>&nbsp</td>";  
              $raw++;
        }
        $currentDay = 7;
    } 
        if($raw%7 == 0)
        {
            echo "<td>$counter</td>";
            $counter++;
            $raw++;
            echo "<tr></tr>";
        }
        else
        {
            echo "<td>$counter</td>";
            $counter++;
            $raw++; 
            
        }
    }

    echo "</table>";
    }

?>
