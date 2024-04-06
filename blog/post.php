<?php
include 'partials/header.php';

include './comments.inc.php';

include './getLikePost.php';


// fetch post from database if id is set
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id = $id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);
} else {
    header('location: ' . ROOT_URL . 'blog.php');
}

?>
    


<section class="singlepost">
    <div class="container singlepost__container">
        <h2><?= $post['title'] ?></h2>
        <div class="post__author">
            <?php
            //fetch author from users table using author_id
            $author_id = $post['author_id'];
            $author_query = "SELECT * FROM users WHERE id=$author_id";
            $author_result = mysqli_query($connection, $author_query);
            $author = mysqli_fetch_assoc($author_result);
            $author_name = $author['firstname'] . $author['lastname'];
            ?>
            <div class="post__author-avatar">
                <img src="./images/<?= $author['avatar'] ?>">
            </div>
            <div class="post__author-info">
                <h5>By: <?= $author_name ?></h5>
                <small>
                    <?= date("M d, Y - H:i", strtotime($post['date_time'])) ?>
                </small>
            </div>
        </div>

        <div class="singlepost__thumbnail">
            <img src="./images/<?=$post['thumbnail']?>">
        </div>

            <div class="text__post">
                <h4>Description</h4>
                
                
                <ul>
                    <?php
                        
                        $lines = explode("\n", trim($post['descript']));
    
                        foreach ($lines as $line) {
                            echo "<li> $line </li>";
                        }
                    
                    ?>
                </ul>
            </div>
    
            <div class="text__post">
                <h4>How to cook?</h4>
             

                <p style="margin-left: 1.6rem;"> <?=nl2br($post['body']) ?> </p>
            </div>


    </div>

</section>






<div class="container comment__container_form" id="comment__container_form">


    <div id="getLike">
        <?= getLike($connection, $id) ?>
    </div>


    <div class="download__pdf">
        <form method="post" action="./downloadRecipe.php">
            <input type="hidden" name="title" value="<?= $post['title'] ?>">
            <input type="hidden" name="description" value="<?= $post['descript'] ?>">

            <input type="hidden" name="body" value="<?= $post['body'] ?>">
            <input type="hidden" name="thumbnail" value="<?= $post['thumbnail'] ?>">

            <button type="submit" class="btn">Download Recipe</button>
        </form>
    </div>
    

    

    <div id="getComment">

        <?=getComments($connection, $id)?>
    </div>
</div>



<!-- =========================== END OF SINGLE POST ============================= -->

<script src="./js/main.js"></script>

<script>
function checkInput() {
    var inputField = document.getElementById('comment');
    var submitButton = document.getElementById('btn-comment');

    var textarea = document.getElementById("comment");
    var rowCount = textarea.value.split("\n").length;
    textarea.rows = rowCount;

    // Kiểm tra nếu ô input không trống
    if (inputField.value.trim() !== '') {
        // Kích hoạt nút
        submitButton.disabled = false;
    } else {
        // Vô hiệu hóa nút
        submitButton.disabled = true;
    }


}

</script>

<?php
include 'partials/footer.php';
?>