<?php

function getLike($connection, $pid) {
    $sql = "SELECT * FROM posts WHERE id='$pid'";
    $result = $connection->query($sql);

    if ($row = $result->fetch_assoc()) {
        $uid = isset($_SESSION['user-id']) ? $_SESSION['user-id'] : '';
        $disable = isset($_SESSION['user-id']) ? '' : 'disabled';
        $likeValue = isset($_SESSION['user-id']) ? (strpos($row['ListUsersLikePost'], $_SESSION['user-id']) ? 'fa-solid' : 'fa-regular') : 'fa-regular';
        $heart__icon = isset($_SESSION['user-id']) ? 'heart__icon_active' : '';

        echo "<div class='like-form'>";
        echo "<form class='like-comment' method='post' onsubmit='likePost(this); return false;'>
                <input type='hidden' name='pid' value='" . $row['id'] . "'>
                <input type='hidden' name='like' value='$likeValue'>
                <input type='hidden' name='uid' value='$uid'>
                <button $disable type='submit'> <i class='fa $likeValue fa-heart $heart__icon heart__icon'></i> </button>
            </form>";
        echo "<p> " . $row['LikesPost'] . " </p>";
        echo "</div>";
    }
}

?>