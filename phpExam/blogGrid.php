<?php
require_once "connection.php";
require_once "header.php";

$query = "SELECT * FROM blog_post";
        
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    echo "<table>";
    echo "<tr>";
    echo "<th>blog_id</th>";
    echo "<th>parent_name</th>";
    echo "<th>title</th>";
    echo "<th>Published At</th>";
    echo "<th>Edit</th>";
    echo "<th>Delete</th>";
    echo "</tr>";
    while($row = mysqli_fetch_assoc($result))
    {
       echo "<tr>";
       echo "<td>".$row['blog_id']."</td>";
       echo "<td>".$row['parent_name']."</td>";
       echo "<td>".$row['title']."</td>";
       echo "<td>".$row['published_at']."</td>";
       echo "<td><a href='editBlog.php?id=".$row['blog_id']."'>Edit</a></td>";
       echo "<td><a href='#?id=".$row['blog_id']."'>Delete</a></td>";
       echo "</tr>";
    }
    echo "</table>";
} 
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Display category</title>
    <style>
        table,tr,td,th{
            border: 1px solid black;
        }
    </style>
</head>
<body>
  
</body>
</html>
