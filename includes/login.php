<?php

include "db.php";
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE username = '$username'";
    $selectUserQuery = mysqli_query($connection, $query);
    if (!$selectUserQuery) {
        die("No user found:" . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_assoc($selectUserQuery)) {
        $dbUserId = $row['user_id'];
        $dbUsername = $row['username'];
        $dbUserPassword = $row['user_password'];
        $dbUserFirstname = $row['user_firstname'];
        $dbUserLastname = $row['user_lastname'];
        $dbUserRole = $row['user_role'];
    }

    if ($username === $dbUsername && $password === $dbUserPassword) {
        $_SESSION['user_id'] = $dbUserId;
        $_SESSION['username'] = $dbUsername;
        $_SESSION['user_firstname'] = $dbUserFirstname;
        $_SESSION['user_lastname'] = $dbUserLastname;
        $_SESSION['user_role'] = $dbUserRole;
        header("Location: ../admin/index.php");
    } elseif ($username == $dbUsername && $password == $dbUserPassword) {
        header("Location:../index.php");
    }

}

?>
