
<form action="calendarrange.php" method="POST">

<input type="number" placeholder="Enter month" name="month" max="12" min="1" style="width: 150px"><br><br>
<input type="number" placeholder="Enter month" name="to" max="12" min="1" style="width: 150px"><br><br>
<input type="number" placeholder="Enter year" name="year" min="2000" max="2030" style="width: 150px"><br><br>
<input type="submit" value="submit" name="submit">

</form>

<?php

extract($_POST);
if($month < $to)
    {
        for($i=$month;$i<=$to;$i++)
        {
            calendar($month,$year);
            $month++;
        }
    }

    function calendar($month,$year)
    {
        $dayArray = array('Sunday'=>0,'Monday'=>1,'Tuesday'=>2,'Wednesday'=>3,'Thursday'=>4,'Friday'=>5,'Saturday'=>6);
        
    
   
        echo "<table border=1px solid black background='index.jfif' style='float:left;margin:40px;height:200px;width:200px;'>";
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
