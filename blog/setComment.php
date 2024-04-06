<?php

include './config/database.php';
include './comments.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $uid = $_REQUEST['uid'];
    $pid = $_REQUEST['pid'];

    $message = $_REQUEST['message'];

    $sql = "INSERT INTO comments (user_id, post_id, message) Values ('$uid', '$pid','$message')";
    $result = mysqli_query($connection, $sql);
    
    getComments($connection, $pid);
    exit;
}

?>