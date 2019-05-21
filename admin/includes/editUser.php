<?php
if (isset($_GET['u_id'])) {
    $user = returnSingleUser($_GET['u_id']);
    $user = mysqli_fetch_assoc($user);
    if (isset($_POST['updateUser'])) {
        updateUser($_GET['u_id']);
    }
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="postTitle">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $user['username'] ?>">
    </div>

    <div class="form-group">
        <label for="userFirstName">First Name:</label>
        <input type="text" class="form-control" name="userFirstName" value="<?php echo $user['user_firstname'] ?>">
    </div>
    <div class="form-group">
        <label for="userLastName">Last Name:</label>
        <input type="text" class="form-control" name="userLastName" value="<?php echo $user['user_lastname'] ?>">
    </div>
    <div class="form-group">
        <label for="userEmail">Email:</label>
        <input type="text" class="form-control" name="userEmail" value="<?php echo $user['user_email'] ?>">
    </div>
    <div class="form-group">
        <label for="userRole">Role:</label>
        <select name="userRole">
            <?php
            if ($user['user_role'] === 'admin') {
                echo "<option value='admin' selected>Admin</option>";
                echo "<option value='subscriber' >Subscriber</option>";
            } else {
                echo "<option value='admin'>Admin</option>";
                echo "<option value='subscriber' selected>Subscriber</option>";
            }
            ?>
        </select>

    </div>

    <div class="form-group">
        <input type="submit" value="Edit User" class="btn btn-primary" name="updateUser">
    </div>

</form>
