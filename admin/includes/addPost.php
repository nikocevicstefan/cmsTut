<?php
if (isset($_POST['createPost'])) {
    createPost();
}
?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="postTitle">Post Title</label>
        <input type="text" class="form-control" name="postTitle">
    </div>
    <div class="form-group">
        <label for="postCategoryId">Post Category ID</label>
        <select name="postCategoryId" id="">
            <?php
                $categories = returnAllCategories();
                while($row = mysqli_fetch_assoc($categories))
                {
                    $catId = $row['cat_id'];
                    $catTitle = $row['cat_title'];
                    echo "<option value='$catId'>$catTitle</option>";
                }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="postAuthor">Post Author</label>
        <input type="text" class="form-control" name="postAuthor">
    </div>
    <div class="form-group">
        <label for="postStatus">Post Status</label>
        <br>
        <select name="postStatus">
            <option value="draft" selected>Draft</option>
            <option value="submitted">Submit</option>
        </select>
    </div>
    <div class="form-group">
        <label for="postImage">Post Image</label>
        <input type="file" class="form-control" name="postImage">
    </div>
    <div class="form-group">
        <label for="postTags">Post Tags</label>
        <input type="text" class="form-control" name="postTags">
    </div>
    <div class="form-group">
        <label for="postContent">Post Content</label>
        <textarea class="form-control" name="postContent" id="" cols="30" rows="10">

        </textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Publish Post" class="btn btn-primary" name="createPost">
    </div>

</form>
