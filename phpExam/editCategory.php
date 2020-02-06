<?php
require_once "connection.php";
$categoryId = $_GET['id'];

$query = "SELECT * FROM category WHERE category_id = $categoryId";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result)) {
    $row = mysqli_fetch_assoc($result);
}
function updateData($tableName, $categoryId)
{
    $categoryId = $_POST['id'];
    global $conn;
    foreach ($_POST as $key => $val) {
        if ($key != 'updateCategory' && $key != 'id') {
            $userData[] = "$key = '$val '";
        }
    }
    $sql = "UPDATE $tableName SET " . implode(', ', $userData) . " WHERE category_id = '$categoryId'";

    $result =  mysqli_query($conn, $sql);
    if ($result) {
        echo "success";
        echo "<script>alert('Record Updated successfully');location.href = 'dashboard.php';</script>";
    } else {
        echo mysqli_error($conn);
    }
}


if (isset($_POST['updateCategory'])) {
    updateData('category', $row['category_id']);
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add new category</title>
    <style>
        label {
            display: inline-block;
            width: 200px;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center">Update Category</h1>
    <form action="editCategory.php" method="post" enctype="multipart/form-data">
        <div class="title">
            <label>Title</label>
            <input type="text" name="title" value="<?= $row['title'] ?>">
        </div><br>
        <div class="content">
            <label>Content</label>
            <input type="text" name="content" value="<?= $row['content'] ?>">
        </div><br>
        <div class="URL">
            <label>URL</label>
            <input type="text" name="url" value="<?= $row['url'] ?>">
        </div><br>
        <div class="metaTitle">
            <label>meta Title</label>
            <input type="text" name="metaTitle" value="<?= $row['metaTitle'] ?>">
        </div><br>
        <div class="parentCategory">
            <div class="parentCategory">
                <label>parent Category</label>
                <?php $parentCategory = ['LifeStyle', 'Health', 'Education', 'Music'] ?>
                <select name="parent_name">
                    <?php foreach ($parentCategory as $items) : ?>
                        <?php $selectedItem = ($row['parent_name'] == $items) ? "selected" : "" ?>
                        <option value="<?php echo $items; ?>" <?= $selectedItem ?>>
                            <?php echo $items; ?></option>
                    <?php endforeach; ?>
                </select>
            </div><br>
            <div class="title">
                <label>Image</label>
                <input type="file" name="categoryImage">
            </div><br><br>
            <input type="hidden" value="<?= $categoryId ?>" name="id">
            <input type="submit" value="Update Category" name="updateCategory">
    </form>
</body>

</html>