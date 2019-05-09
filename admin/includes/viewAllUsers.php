<table class="table table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM users";
    $allUsers = showUsers($query);

    if(isset($_GET['delete']))
    {
        $userId = $_GET['delete'];
        deleteUser($userId);
    }
    ?>
    </tbody>
</table>
