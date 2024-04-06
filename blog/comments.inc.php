<?php

function getComments($connection, $pid)
{
        $sql = "SELECT * FROM comments where post_id='$pid'" ;
        $result = $connection->query($sql);
    
        $numRows = $result->num_rows;
        
        echo "<h2 style='color: var(--color-black)'>$numRows Comments </h2>";
    
        if(isset($_SESSION['user-id'])){
            $id = $_SESSION['user-id'];
    
            $sql3 = "SELECT * FROM users where id='$id'";
            $result3 = $connection->query($sql3);
            if($row3 = $result3->fetch_assoc())
            {
                $url = ROOT_URL . 'images/' . $row3['avatar'];
    
                echo "
                    <form id='comment-form' method='post' onsubmit='submitCommentForm(); return false;'>
                        <div class='comment__input'>
                            <div style='height: 100%;' >
                                <div style='background-image: url($url);' class='comment__logo'>
                                </div>
                            </div>
                            <input type='hidden' name='pid'  value='$pid'>
                            <input type='hidden' name='uid'  value='$id'>

                            <textarea rows='1' cols='50' type='text' name='message' id='comment' oninput='checkInput()' placeholder='Write comment...'></textarea>
                            <div>
                                <button name='submit-comment' id='btn-comment' disabled type='submit'  class='btn  btn-comment'>Comment</button>
                            </div>
                        </div>    

                    </form>
                    ";
            }
        }
        
        
        echo "<div id='comments-container' class='comment__container' style='margin-top: 1rem;'>";
        while ($row = $result->fetch_assoc()) {
            $id = $row['user_id'];
            // $pid = $row['post_id'];

            $sql2 = "SELECT * FROM users where id='$id'";
            $result2 = $connection->query($sql2);
    
            if($row2 = $result2->fetch_assoc()){
    
                $url = ROOT_URL . 'images/' . $row2['avatar'];
                echo "
                        <div class='comment'>
                            <div style='height: 100%'>
                                <div style='background-image: url($url);' class='comment__logo'>
                                </div>
                            </div>
                
                            <div class='comment__content'>
                                <div class='comment__content__header'>
                                    
                                    <h5 style='color: var(--color-black);'>".$row2['username']."</h5>
                                    <small class='date-time'>
                                    
                                        " . date("M d, Y - H:i", strtotime($row['timestamp'])) . "
                                    </small>
                                </div>
    
                                <p style='margin-top: 0px;' class='comment__body'>
                                    " . nl2br($row['message']) . "
                                </p>
    
                                <div class='comment__functions'>";

                                $uid = '';
                                $disable = 'disabled';
                                $likeValue = 'fa-regular';
                                $heart__icon = '';

                                if(isset($_SESSION['user-id'])){
                                    $disable = '';
                                    $likeValue = strpos($row['ListUsersLike'], $_SESSION['user-id'])  ? 'fa-solid' : 'fa-regular';
                                    $uid = $_SESSION['user-id'];
                                    $heart__icon = 'heart__icon_active';
                                }
                                    echo "<div class='like-form'>";
                                        echo "<form class='like-comment' method='post' onsubmit='likeComment(this); return false;'>
                                                <input type='hidden' name='cid' value='" . $row['id'] . "'>
                                                <input type='hidden' name='pid' value='" . $row['post_id'] . "'>

                                                
                                                <input type='hidden' name='like' value='$likeValue'>
                                                <input type='hidden' name='uid' value='$uid'>
                                                
                                                <button $disable type='submit'> <i class='fa $likeValue fa-heart $heart__icon heart__icon'></i> </button>
                                            </form>";

                                        echo "<p> " . $row['like'] . " </p>" ; 
                                    
                                    echo "</div>";
                                            
                                if(isset($_SESSION['user-id'])){
                                    
                                    if($_SESSION['user-id'] == $row2['id']){
                                        echo "
                                            <form class='edit-form' method='post' onsubmit='deleteComment(this); return false;'>
                                                <input type='hidden' name='cid'  value='" . $row['id'] . "'>
                                                <input type='hidden' name='pid'  value='" . $row['post_id'] . "'>
            
                                                <button type='submit' class='btn  btn-comment' >Delete</button>
                                            </form>
                
                                            <form class='edit-form' method='post' action='editcomment.php'>
                                                <input type='hidden' name='cid'  value='" . $row['id'] . "'>
                                                <input type='hidden' name='uid'  value='" . $row['user_id'] . "'>
                                                <input type='hidden' name='pid'  value='" . $row['post_id'] . "'>
                                                <input type='hidden' name='timestamp' id='timestamp' value='" . $row['timestamp'] . "'>
                                                <input type='hidden' name='like'  value='" . $row['like'] . "'>
                                                <input type='hidden' name='message' id='message' value='" . $row['message'] . "'>
                                                <button class='btn  btn-comment'>edit</button>
                                            </form>";
                                    } 
                                }
                                    // echo "<p> You need to be logged in to reply! </p>";
    
                                echo "
                                </div>
    
                            </div>
                        </div>
                    
                    ";
            }
        }

        echo "</div>";

}

function editComments($connection)
{
    if (isset($_POST['submit-comment'])) {

        $uid = $_SESSION['user-id'];
        $pid = $_POST['pid'];
        $id = $_POST['cid'];

        $message = $_POST['message'];

        $sql = "UPDATE comments SET message='$message' where user_id='$uid' and post_id='$pid' and id='$id'";
        $result = mysqli_query($connection, $sql);
        header("Location: post.php?id=$pid");
        exit;
    }
}

