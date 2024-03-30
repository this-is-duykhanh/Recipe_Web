<?php
include 'partials/header.php';

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
        <p>
            <?= $post['body'] ?>
        </p>
    </div>

    <div class="container singlepost__container">
        <h2>Comments</h2>
       
        <div style="background-color: #fff; color: #000;">
           
            <div class="comment__input">
                <form action="">
                    <div style="font-size: 0.9rem; font-weight: bold;" class="comment__user">
                        Long vu
                    </div>
        
                    <input style="background-color: #fff ; color: #000;" type="text" id="submit" placeholder="Write something...">
                    <button type="submit" class="btn">Submit</button>
                </form>
            </div>    
        
            <div class="comment__container" style="margin-top: 1rem;">
                <div class="comment">

                    <div style="height: 100%">
                        <div style="background: url('./images/17117789592020-03-20-19-20-38.jpg');" class="comment__logo">
                        </div>
                    </div>

                    <div class="comment__content">
                        <div class="comment__content__header">
                           
                            <h5 style="color: var(--color-black);">Duy Khanh</h5>
                            <small class="date-time">
                                16 gio truoc
                            </small>
                        </div>
                        <p style="margin-top: 0px;" class="comment__body">
                            Lsumenda nisi erferendissdfgsdfgsd fsdgfsdg fdsgfsd s fsdgsdg fgsgsfdg asdfasdf dfaasdf đấ dà delectus ddddddddddddddddc
                        </p>
                    </div>
                </div>

                <div class="comment">
                    <div style="background: url('./images/17117789592020-03-20-19-20-38.jpg');" class="comment__logo">
                    </div>

                    <div class="comment__content">
                        <div class="comment__content__header">
                           
                            <h5 style="color: var(--color-black);">Duy Khanh</h5>
                            <small class="date-time">
                                16 gio truoc
                            </small>
                        </div>
                        <p style="margin-top: 0px;" class="comment__body">
                            Lsumenda nisi erferendis delectus ddddddddddddddddc
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>




<!-- =========================== END OF SINGLE POST ============================= -->

<?php
include 'partials/footer.php';
?>