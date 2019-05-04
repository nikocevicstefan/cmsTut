<table class="table table-hover">
    <thead>
    <tr>
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

    if(isset($_GET['delete']))
    {
        $postId = $_GET['delete'];
        deletePost($postId);
    }
    ?>
    </tbody>
</table>
