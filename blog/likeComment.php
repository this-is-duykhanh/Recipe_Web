<?php
include './config/database.php';
include './comments.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    
    $id = $_REQUEST['cid'];
    $pid = $_REQUEST['pid'];
    $uid = $_REQUEST['uid'];

    $like = $_REQUEST['like'];

    if($like == 'fa-regular')
    {
        $sql = "UPDATE comments SET `like`=`like` + 1, `ListUsersLike` = CONCAT(`ListUsersLike`, ' ', $uid) WHERE id='$id'";
    }
    else{
        $sql = "UPDATE comments SET `like` = `like` - 1, `ListUsersLike` = TRIM(BOTH ' ' FROM REPLACE(`ListUsersLike`, '$uid', '')) WHERE id='$id'";
    }

    // Update the like count in the database

    $result = mysqli_query($connection, $sql);
    if (!$result) {

        echo "Error: " . mysqli_error($connection);
        exit;
    }

    getComments($connection, $pid);
    exit;
}

?>