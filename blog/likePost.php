<?php
include './config/database.php';
include './getLikePost.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){


    $pid = $_REQUEST['pid'];
    $uid = $_REQUEST['uid'];
    $like = $_REQUEST['like'];

    if($like == 'fa-regular')
    {
        $sql = "UPDATE posts SET `LikesPost`=`LikesPost` + 1, `ListUsersLikePost` = CONCAT(`ListUsersLikePost`, ' ', $uid) WHERE id='$pid'";
    }
    else{
        $sql = "UPDATE posts SET `LikesPost` = `LikesPost` - 1, `ListUsersLikePost` = TRIM(BOTH ' ' FROM REPLACE(`ListUsersLikePost`, '$uid', '')) WHERE id='$pid'";
    }

    // Update the like count in the database

    $result = mysqli_query($connection, $sql);
    if (!$result) {

        echo "Error: " . mysqli_error($connection);
        exit;
    }

    getLike($connection, $pid);
    exit;
}