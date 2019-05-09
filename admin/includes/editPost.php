<?php
if (isset($_GET['p_id'])) {
    $post = returnSinglePost($_GET['p_id']);
    $post = mysqli_fetch_assoc($post);
    if (isset($_POST['updatePost'])) {
        updatePost($_GET['p_id']);
    }
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="postTitle">Post Title</label>
        <input type="text" class="form-control" name="postTitle" value="<?php echo $post['post_title'] ?>">
    </div>
    <div class="form-group">
        <label for="postCategoryId">Post Category</label>
        <select name="postCategoryId" id="">
            <?php
            $categories = returnCategories();
            while ($row = mysqli_fetch_assoc($categories)) {
                $catId = $row['cat_id'];
                $catTitle = $row['cat_title'];
                echo "<option value='$catId'>$catTitle</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="postAuthor">Post Author</label>
        <input type="text" class="form-control" name="postAuthor" value="<?php echo $post['post_author'] ?>">
    </div>
    <div class="form-group">
        <label for="postStatus">Post Status</label>
        <br>
        <select name="postStatus">
            <?php
            $postStatus = $post['post_status'];
            if ($postStatus === 'submitted') {
                echo "<option value='$postStatus' selected>Submit</option>";
                echo "<option value='draft'>Draft</option>";
            } else {
                echo "<option value='submitted'>Submit</option>";
                echo "<option value='$postStatus' selected>Draft</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="postImage">Post Image</label><br>
        <img src="../images/<?php echo $post['post_image'] ?>" style="width: 100px;" alt="">
        <input type="file" class="form-control" name="postImage">
    </div>
    <div class="form-group">
        <label for="postTags">Post Tags</label>
        <input type="text" class="form-control" name="postTags" value="<?php echo $post['post_tags'] ?>">
    </div>
    <div class="form-group">
        <label for="postContent">Post Content</label>
        <textarea class="form-control" name="postContent" id="" cols="30"
                  rows="10"><?php echo $post['post_content'] ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Edit Post" class="btn btn-primary" name="updatePost">
    </div>

</form>
