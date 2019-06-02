<?php

function showPosts($query)
{
    global $connection;
    $allPostsQuery = "SELECT * FROM posts";
    $allPosts = mysqli_query($connection, $query);
    if (!$allPosts) {
        die("Query showing posts has failed:" . mysqli_error($connection));
    }
    while ($row = mysqli_fetch_assoc($allPosts)) {
        $postId = $row['post_id'];
        $postTitle = $row['post_title'];
        $postAuthor = $row['post_author'];
        $postDate = $row['post_date'];
        $postImage = $row['post_image'];

//        If the function is called from index page then content should be shortened
        if ($query == $allPostsQuery) {
            $postContent = substr($row['post_content'], 0, 50);
        } else {
            $postContent = $row['post_content'];
        }
        /*Include the post layout*/
        include "includes/postsLayout.php";
    }

}

function returnAllPosts()
{
    global $connection;
    $query = "SELECT * FROM posts";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Posts not found:" . mysqli_error($connection));
    } else {
        return $result;
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

function createComment($postId)
{
    global $connection;
    $commentPost = $postId;
    $commentAuthor = $_POST['commentAuthor'];
    $commentEmail = $_POST['commentEmail'];
    $commentContent = $_POST['commentContent'];
    $commentStatus = 'unapproved';


    $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) VALUES($commentPost, '$commentAuthor', '$commentEmail', '$commentContent', '$commentStatus', now())";
    $result = mysqli_query($connection, $query);
    if(!$result)
    {
        die("Creating Comment FAILED:". mysqli_error($connection));
    }else
        {
            $increaseCommentCountQuery = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $postId";
            $result = mysqli_query($connection, $query);
        }
}

function readPostComments()
{
    global $connection;
    $postId = $_GET['p_id'];
    $query = "SELECT * FROM comments WHERE comment_post_id = $postId AND comment_status = 'approved' ORDER BY comment_id DESC";
    $result = mysqli_query($connection, $query);
    if(!$result)
    {
        die("Returning comments FAILED:".mysqli_error($connection));
    }else
        {
            return $result;
        }
}