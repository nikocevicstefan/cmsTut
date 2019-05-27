<?php
if (isset($_POST['checkboxArray'])) {
    foreach ($_POST['checkboxArray'] as $checkboxValue) {
        $bulkOptions = $_POST['bulkOptions'];
        switch ($bulkOptions) {
            case 'submitted':
                $query = "UPDATE posts SET post_status = '$bulkOptions' WHERE post_id = $checkboxValue";
                mysqli_query($connection, $query);
                break;
            case 'draft':
                $query = "UPDATE posts SET post_status = '$bulkOptions' WHERE post_id = $checkboxValue";
                mysqli_query($connection, $query);
                break;
            case 'delete':
                $query = "DELETE FROM posts WHERE post_id = $checkboxValue";
                mysqli_query($connection, $query);
                break;
            default:
                break;
        }
    }
}
?>



<form action="" method="post">
    <table class="table table-hover table-bordered">

        <div id="bulkOptionContainer" class="col-xs-4" style="padding: 0">
            <select name="bulkOptions" id="" class="form-control">
                <option value="none">Select Options</option>
                <option value="submitted">Submit</option>
                <option value="draft">Draft</option>
                <option value="delete">Delete</option>
            </select>
        </div>
        <div class="col-xs-4">
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
        </div>
        <thead>
            <tr>
                <th><input type="checkbox" id="selectAllBoxes" onclick="toggleCheckboxes(this);"></th>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
        $query = "SELECT * FROM posts";
        $allPost = showPosts($query);

        if (isset($_GET['delete'])) {
            $postId = $_GET['delete'];
            deletePost($postId);
        }
        ?>
        </tbody>
    </table>
</form>
