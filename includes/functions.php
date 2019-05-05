<?php

function showPosts($query)
{
    global $connection;
    $allPosts = mysqli_query($connection, $query);
    if(!$allPosts)
    {
        die("Query showing posts has failed:".mysqli_error($connection));
    }
    while($row = mysqli_fetch_assoc($allPosts))
    {
        $postId = $row['post_id'];
        $postTitle = $row['post_title'];
        $postAuthor = $row['post_author'];
        $postDate = $row['post_date'];
        $postImage = $row['post_image'];
        $postContent = $row['post_content'];

        /*Include the post layout*/
        include "includes/postsLayout.php";
    }

}

function showCategories()
{
    global $connection;
    $query = "SELECT * FROM  categories";
    $allCategories = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($allCategories)) {
        $catTitle = $row['cat_title'];
        $catId = $row['cat_id'];
        echo "<li><a href='index.php?category=$catId'>{$catTitle}</a></li>";
    }
}
