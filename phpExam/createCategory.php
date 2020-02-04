<?php
require_once "connection.php";
require_once "validation.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add new category</title>
    <style>
        label
        {
            display: inline-block;
            width : 200px;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center">Add Category</h1>
    <form action="createCategory.php" method="post" enctype="multipart/form-data">
        <div class="title">
            <label>Title</label>
            <input type="text" name="title">
        </div><br>
        <div class="content">
            <label>Content</label>
            <input type="text" name="content">
        </div><br>
        <div class="URL">
            <label>URL</label>
            <input type="text" name="URL">
        </div><br>
        <div class="metaTitle">
            <label>meta Title</label>
            <input type="text" name="metaTitle">
        </div><br>
        <div class="parentCategory">
            <div class="parentCategory">
            <label>parent Category</label>
            <?php $parentCategory = ['LifeStyle','Health','Education','Music']?>
            <select name="parentCategory">
            <?php foreach($parentCategory as $items) :?>
                <option name="parentCategory" value="<?php echo $items;?>" >
                <?php echo $items;?></option>
            <?php endforeach;?>
            </select>
            </div><br>
        <div class="title">
            <label>Image</label>
            <input type="file" name="categoryImage">
        </div><br><br>
        <input type="submit" value="Add Category" name="addCategory">
    </form>
</body>
</html>