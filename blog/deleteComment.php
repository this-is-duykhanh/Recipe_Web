<?php
include './config/database.php';
include './comments.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $id = $_REQUEST['cid'];
    $pid = $_REQUEST['pid'];


    $sql = "DELETE From comments where id='$id'";
    $result = mysqli_query($connection, $sql);

    getComments($connection, $pid);
    exit;
}

?>