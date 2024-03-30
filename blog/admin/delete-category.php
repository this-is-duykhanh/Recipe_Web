<?php
require 'config/database.php';

if(isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // FOR LATER
    // update cateogry_id of posts that belong to this category to id of uncategorized category
    $update_query = "UPDATE posts SET category_id=11 WHERE category_id=$id";
    $update_result = mysqli_query($connection, $update_query);
    
    // delete category from database
    if(!mysqli_errno($connection)){
        $query = "DELETE FROM categories WHERE id=$id";
        $result = mysqli_query($connection, $query);
        $_SESSION['delete-category-success'] = "Category {$category['title']} deleted successfully";
    } else {
        $_SESSION['delete-category'] = "Couldn't delete category {$category['title']}";
    }
}

header('location: ' . ROOT_URL . 'admin/manage-categories.php');
die();