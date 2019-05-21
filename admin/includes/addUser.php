<?php
if (isset($_POST['createUser'])) {
    createUser();
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="postTitle">Username</label>
        <input type="text" class="form-control" name="username" >
    </div>

    <div class="form-group">
        <label for="userFirstName">First Name:</label>
        <input type="text" class="form-control" name="userFirstName" >
    </div>
    <div class="form-group">
        <label for="userLastName">Last Name:</label>
        <input type="text" class="form-control" name="userLastName" >
    </div>
    <div class="form-group">
        <label for="userEmail">Email:</label>
        <input type="email" class="form-control" name="userEmail" >
    </div>
    <div class="form-group">
        <label for="userPassword">Password:</label>
        <input type="password" class="form-control" name="userPassword" >
    </div>
    <div class="form-group">
        <label for="userRole">Role:</label>
        <select name="userRole">
            <option value="admin">Admin</option>
            <option value="subscriber" selected>Subscriber</option>
        </select>
    </div>

    <div class="form-group">
        <input type="submit" value="Add User" class="btn btn-primary" name="createUser">
    </div>

</form>


