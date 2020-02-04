<?php
require_once "connection.php";
$blogId = $_GET['id'];
$query = "SELECT * FROM blog_post WHERE blog_id = '$blogId'";
        
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result)) {
    $row = mysqli_fetch_assoc($result);

} 
function updateData($tableName,$userId)
{
    global $blogId;
    global $conn;
    $userData = [];
    foreach($_POST['other-info'] as $key=>$val) 
    {
        if(is_array($val))
        {
            foreach($val as $item)
            {
                $implodeData =  implode(', ', $userData);
               $sql = "UPDATE $tableName SET $implodeData WHERE blog_id = '$blogId'";
               echo $sql."<br>";
               $userData = [];
            } 
        }
        else
        {
            $implodeData =  implode(', ', $userData);
            $sql = "UPDATE $tableName SET $implodeData WHERE blog_id = '$blogId' ";
            echo $sql."<br>";
            $userData = [];
        }
    
    }
}

if(isset($_POST['updateBlog']))
{
    updateData('blog_post',$row['blog_id']);
}

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
    <h1 style="text-align: center">Edit Blog</h1>
    <form action="createBlog.php" method="post" enctype="multipart/form-data">
        <div class="title">
            <label>Title</label>
            <input type="text" name="title" value="<?= $row['title']?>">
        </div><br>
        <div class="content">
            <label>Content</label>
            <input type="text" name="content"  value="<?= $row['content']?>">
        </div><br>
        <div class="URL">
            <label>URL</label>
            <input type="text" name="URL"  value="<?= $row['url']?>">
        </div><br>
        <div class="publishedAt">
            <label>published At</label>
            <input type="date" name="publishedAt" value="<?= $row['published_at']?>">
        </div><br>
        <div class="parentCategory">
            <div class="parentCategory">
            <label>parent Category</label>
            
            
            
             <select name="parentCategory[]" multiple>
             <?php $parentCategory = ['LifeStyle','Health','Education','Music']?>
                 <?php $get = explode(",",$row['parent_name'])?>
                            <?php foreach($parentCategory as $items): ?>
                                <?php $selectedValue = (in_array($items,$get)) ? "selected" : ""?>  
                                <option value="<?php echo $items ; ?>"
                                <?php echo $selectedValue?>>
                                <?php echo $items ; ?>
                            </option>
                            <?php endforeach;?>
                        </select>
            </div><br>
        <div class="image">
            <label>Image</label>
            <input type="file" name="categoryImage" value="<?= $row['categoryImage']?>">
        </div><br><br>
        <input type="submit" value="Update Blog" name="updateBlog">
    </form>
</body>
</html>

