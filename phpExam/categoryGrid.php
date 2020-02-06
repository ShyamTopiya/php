<?php
require_once "connection.php";
require_once "header.php";
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Display category</title>
    <style>
        table,
        tr,
        td,
        th {
            border: 1px solid black;
        }

        img {
            height: 50px;
            width: 100px;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center">Blog Category</h1>
    <a href="createCategory.php">Add Category</a><br>
    <br>
</body>

</html>

<?php
$query = "SELECT * FROM category";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>category_id</th>";
    echo "<th>parent_category_name</th>";
    echo "<th>Created_at</th>";
    echo "<th>categoryImage</th>";
    echo "<th>Edit</th>";
    echo "<th>Delete</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['category_id'] . "</td>";
        echo "<td>" . $row['parent_name'] . "</td>";
        echo "<td>" . $row['created_at'] . "</td>";
        echo '<td><img src="' . $row['categoryImage'] . '"></td>';
        echo "<td><a href='editCategory.php?id=" . $row['category_id'] . "'>Edit</a></td>";
        echo "<td><a href='deleteRecord.php?id=" . $row['category_id'] . "'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>