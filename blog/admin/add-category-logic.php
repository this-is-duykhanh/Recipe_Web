<?php
require 'config/database.php';



if (isset($_POST['submit'])) {
    // get form data
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$title) {
        $_SESSION['add-category'] = "Enter title";
    } else if (!$description) {
        $_SESSION['add-category'] = "Enter description";
    } else {
        // check if category already exist in database
        $category_check_query = "SELECT * FROM categories WHERE title = '$title'";
        $category_check_result = mysqli_query($connection, $category_check_query);
        if (mysqli_num_rows($category_check_result) > 0) {
            $_SESSION['add-category'] = "Category already exist";
        }
    }

    // redirect back to add category page with form data if was invalid input
    if (isset($_SESSION['add-category'])) {
        $_SESSION['add-category-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/add-category.php');
        die();
    } else {
        // insert category into database using prepared statement
        $query = "INSERT INTO categories (title, description) VALUES (?, ?)";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, 'ss', $title, $description);
        mysqli_stmt_execute($stmt);

        if (mysqli_errno($connection)) {
            $_SESSION['add-category'] = "Couldn't add category";
            header('location: ' . ROOT_URL . 'admin/add-category.php');
            die();
        } else {
            $_SESSION['add-category-success'] = "Category $title added successfully";
            header('location: ' . ROOT_URL . 'admin/manage-categories.php');
            die();
        }
    }
}
