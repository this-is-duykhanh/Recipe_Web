<?php
include 'partials/header.php';

// fetch categories from database
$query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $query);

// get back form data if form was invalid
$title = $_SESSION['add-post-data']['title'] ?? null;
$body = $_SESSION['add-post-data']['body'] ?? null;
$description = $_SESSION['add-post-data']['description'] ?? null;


// delete form data session 
unset($_SESSION['add-post-data']);
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2 style="color: var(--color-gray-700)" >Add Post</h2>
        <?php if(isset($_SESSION['add-post'])) :?> 
            <div class="alert__message error">
                <p>
                    <?= $_SESSION['add-post']; 
                    unset($_SESSION['add-post']);
                    ?>
                </p>
            </div>
        <?php endif ?>
        <form action="<?= ROOT_URL?>admin/add-post-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="title" value="<?= $title ?>" placeholder="Title">

            <select name="category">
                <?php while($category = mysqli_fetch_assoc($categories)) :?>
                    <option value="<?= $category['id']?>"><?=$category['title'] ?></option>
                <?php endwhile ?>
            </select>
            
            <textarea name="description" rows="6" placeholder="Description"><?= $description ?></textarea>

            <textarea name="body" rows="10" placeholder="Body"><?= $body ?></textarea>
            
            <?php if(isset($_SESSION['user_is_admin'])) : ?>
                <div class="form__control inline">
                    <input type="checkbox" name="is_featured" value="1" id="is_featured" checked>
                    <label style="color: var(--color-black)" for="is_featured">Featured</label>
                </div>
            <?php endif ?>

            <div class="form__control">
                <label style="color: var(--color-black)" for="thumbnail">Add Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>

            <button type="submit" name="submit" class="btn">Add Post</button>
        </form>
    </div>
</section>

<?php
include '../partials/footer.php';
?>