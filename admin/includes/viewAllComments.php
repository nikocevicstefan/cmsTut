<table class="table table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Author</th>
        <th>Comment</th>
        <th>Date</th>
        <th>Status</th>
        <th>Email</th>
        <th>In response to</th>
        <th>Un/Approve</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM comments";
    $allComments = showComments($query);
    ?>
    </tbody>
</table>
