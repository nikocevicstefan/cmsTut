<?php
function addCategories()
{
    global $connection;
    $catTitle = $_POST['catTitle'];

    $catTitle = mysqli_real_escape_string($connection, $catTitle);

    $query = "INSERT INTO categories (cat_title) VALUES ('$catTitle')";

    $result = mysqli_query($connection, $query);
    if(!$result)
    {
        die("Adding a new category FAILED:".mysqli_error($connection));
    }
}