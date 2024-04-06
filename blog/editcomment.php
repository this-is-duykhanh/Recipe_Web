<?php
include "./config/database.php";

include "./comments.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    $uid = $_POST['uid'];
    $message = $_POST['message'];
    $cid = $_POST['cid'];
    $pid = $_POST['pid'];


echo "
<form method='post' action='".editComments($connection)."'>
    <div class='comment__input'>
        <div style='height: 100%'>
            <div style='background: url('./images/17117789592020-03-20-19-20-38.jpg');' class='comment__logo'>
            </div>
        </div>

        <input type='hidden' name='cid' id='cid' value='$cid'>
        <input type='hidden' name='uid' id='uid' value='$uid'>
        <input type='hidden' name='pid' id='pid' value='$pid'>
        <textarea rows='10' cols='50' type='text' name='message' id='comment'>". $_POST['message'] ."</textarea>

        <button name='submit-comment' id='btn-comment' type='submit'  class='btn  btn-comment'>Comment</button>
    </div>    
</form>
";

?>
    
</body>
</html>