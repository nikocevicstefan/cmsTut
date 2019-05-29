<?php
include "includes/header.php";
include "includes/functions.php";
include "includes/db.php";


if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $firstname = mysqli_real_escape_string($connection, $firstname);
    $lastname = mysqli_real_escape_string($connection, $lastname);
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT randSalt FROM users";
    $selectRandSaltQuery = mysqli_query($connection, $query);
    if (!$selectRandSaltQuery) {
        die("QUERY FAILED:" . mysqli_error($connection));
    }

    $row = mysqli_fetch_assoc($selectRandSaltQuery);
    $salt = $row['randSalt'];
    $password = crypt($password, $salt);

    if(!empty($username) && !empty($password) && !empty($firstname) && !empty($lastname) && !empty($email)){
        $query = "INSERT INTO users (username, user_firstname, user_lastname, user_email, user_password, user_role) VALUES('{$username}', '{$firstname}', '{$lastname}', '{$email}','{$password}','subscriber')";
        $registerUserQuery = mysqli_query($connection, $query);
        $message = "Registration successful";
        if(!$registerUserQuery){
            die("QUERY FAILED:".mysqli_error($connection).' '.mysqli_errno($connection));
        }
    }else{
        $message = "Fields cannot be empty";
    }

}else{
    $message = "";
}
?>

<!-- Navigation -->

<?php include "includes/navigation.php"; ?>


<!-- Page Content -->
<div class="container">

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Register</h1>
                        <h6 class="text-center"><?php echo $message?></h6>
                        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <label for="username" class="sr-only">username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                       placeholder="Enter Desired Username" required>
                            </div>
                            <div class="form-group">
                                <label for="firstname" class="sr-only">First Name</label>
                                <input type="text" name="firstname" id="firstname" class="form-control"
                                       placeholder="Enter Your First Name" required>
                            </div>
                            <div class="form-group">
                                <label for="lastname" class="sr-only">Last Name</label>
                                <input type="text" name="lastname" id="lastname" class="form-control"
                                       placeholder="Enter Your Last Name" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                       placeholder="somebody@example.com" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control"
                                       placeholder="Password" required>
                            </div>

                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block"
                                   value="Register" required>
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>


    <hr>


    <?php include "includes/footer.php"; ?>
