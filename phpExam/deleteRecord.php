<?php
require_once "validation.php";
$userId = $_GET['id'];

deleteRecord("blog_post", "blog_id = $userId");
deleteRecord("category", "category_id = $userId");
header('location:dashboard.php');
?>