<?php
function addCategories()
{
    global $connection;
    $catTitle = $_POST['catTitle'];

    $catTitle = mysqli_real_escape_string($connection, $catTitle);

    $query = "INSERT INTO categories (cat_title) VALUES ('$catTitle')";

    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Adding a new category FAILED:" . mysqli_error($connection));
    }
}

function editCategory()
{
    global $connection;
    $catId = $_GET['edit'];
    $catTitle = $_POST['catTitleEdit'];
    $catTitle = mysqli_real_escape_string($connection, $catTitle);

    $query = "UPDATE categories SET cat_title = '$catTitle' WHERE cat_id = $catId";

    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Update failed:" . mysqli_error($connection));
    }
}

function deleteCategory()
{
    global $connection;
    $catId = $_GET['delete'];
    $query = "DELETE FROM categories WHERE cat_id = $catId";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Category failed to delete:" . mysqli_error($connection));
    } else {
        header("Location: categories.php");
    }
}

function returnCategoryTitle()
{
    global $connection;
    $catId = $_GET['edit'];
    $query = "SELECT * FROM categories WHERE cat_id = $catId";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Returning Category FAILED:" . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
        return $row['cat_title'];
    }
}

function returnCategories()
{
    global $connection;
    $query = "SELECT * FROM categories";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("No categories returned:" . mysqli_error($connection));
    } else {
        return $result;
    }
}