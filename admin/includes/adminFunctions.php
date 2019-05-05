<?php

/*Categories functions*/
/**
 *
 */
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

/**
 *
 */
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
    }else
        {
            header("Location: categories.php");
        }
}


/**
 * @param $id
 * deletes selected category and returns to the categories page
 */
function deleteCategory($id)
{
    global $connection;
    $query = "DELETE FROM categories WHERE cat_id = $id";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Category failed to delete:" . mysqli_error($connection));
    } else {
        header("Location: categories.php");
    }
}

/**
 * @param $id
 * @return bool|mysqli_result
 * returns selected category
 */
function returnCategory($id)
{
    global $connection;
    $query = "SELECT * FROM categories WHERE cat_id = $id";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Returning Category FAILED:" . mysqli_error($connection));
    } else {
        return $result;
    }
}

/**
 * @return bool|mysqli_result
 * returns all categories
 */
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

/*Posts functions*/

/**
 * @param $query
 * Displays all posts in a table
 */
function showPosts($query)
{
    global $connection;
    $allPosts = mysqli_query($connection, $query);
    if (!$allPosts) {
        die("Query showing posts has failed:" . mysqli_error($connection));
    }
    while ($row = mysqli_fetch_assoc($allPosts)) {
//        $sortedRow = [$row['post_id'], $row['post_author'],$row['post_category_id'],$row['post_status'],$row['post_image'],$row['post_tags'],$row['post_comment_count'],$row['post_date']];
        $postId = $row['post_id'];
        $postAuthor = $row['post_author'];
        $postTitle = $row['post_title'];
        $postCategoryId = $row['post_category_id'];
        $postStatus = $row['post_status'];
        $postImage = $row['post_image'];
        $postTags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $postDate = $row['post_date'];

        $postCategory = mysqli_fetch_assoc(returnCategory($postCategoryId));
        $postCategoryTitle = $postCategory['cat_title'];

        echo "<tr>";
        echo "<td>{$postId}</td>";
        echo "<td>{$postAuthor}</td>";
        echo "<td>{$postTitle}</td>";
        echo "<td>{$postCategoryTitle}</td>";
        echo "<td>{$postStatus}</td>";
        echo "<td><img src='../images/{$postImage}' class='img-responsive' alt='category image' style='width: 100px;'></td>";
        echo "<td>{$postTags}</td>";
        echo "<td>{$post_comment_count}</td>";
        echo "<td>{$postDate}</td>";
        echo "<td>
                     <div class='col-xs-6'>
                        <a href='posts.php?source=edit_post&p_id=$postId'><i class='fa fa-edit'></i></a>                    
                     </div>
                     <div class='col-xs-6'> 
                        <a href='posts.php?delete=$postId'><i class='fa fa-close'></i></a>
                     </div>
              </td>";
        echo "</tr>";
    }

}

/**
 * Creates a post based on form data
 */
function createPost()
{
    global $connection;
    $postAuthor = $_POST['postAuthor'];
    $postTitle = $_POST['postTitle'];
    $postCategoryId = $_POST['postCategoryId'];
    $postStatus = $_POST['postStatus'];

    $postImage = $_FILES['postImage']['name'];
    $postImageTemp = $_FILES['postImage']['tmp_name'];

    $postTags = $_POST['postTags'];
    $postCommentCount = 4;
    $postContent = $_POST['postContent'];
    $postDate = date('d-m-y');

    /*moving image from the temporary location to our storage*/
    move_uploaded_file($postImageTemp, "../images/$postImage");

    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) 
              VALUES({$postCategoryId},'{$postTitle}','{$postAuthor}', now() ,'{$postImage}','{$postContent}','{$postTags}' , {$postCommentCount},'{$postStatus}')";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Post creation failed:" . mysqli_error($connection));
    }else
        {
            header("Location: posts.php");
        }
}

/**
 * @param $id
 * Updates the selected post
 */
function updatePost($id)
{
    global $connection;
    $postAuthor = $_POST['postAuthor'];
    $postTitle = $_POST['postTitle'];
    $postCategoryId = $_POST['postCategoryId'];
    $postStatus = $_POST['postStatus'];

    $postImage = $_FILES['postImage']['name'];
    $postImageTemp = $_FILES['postImage']['tmp_name'];

    $postTags = $_POST['postTags'];
    $postContent = $_POST['postContent'];
    $postDate = date('d-m-y');

//    If the user doesnt choose an image to update the post the old one gets called back
    if (empty($postImage))
    {
        $post = returnSinglePost($id);
        while($row = mysqli_fetch_assoc($post))
        {
            $postImage = $row['post_image'];
        }
    }

    /*moving image from the temporary location to our storage*/
    move_uploaded_file($postImageTemp, "../images/$postImage");

    $query = "UPDATE posts SET post_category_id = $postCategoryId, post_title = '$postTitle', post_author = '$postAuthor', post_date = now(), post_image = '$postImage' , post_content = '$postContent', post_tags = '$postTags', post_status = '$postStatus' WHERE post_id = $id";

    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Post creation failed:" . mysqli_error($connection));
    } else {
        header("Location: posts.php");
    }
}


/**
 * @param $id
 * Deletes the selected post and returns to the posts page
 */
function deletePost($id)
{
    global $connection;
    $query = "DELETE FROM posts WHERE post_id = $id";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Delete Query failed:" . mysqli_error($connection));
    } else {
        header("Location: posts.php");
    }
}

/**
 * @param $id
 * @return bool|mysqli_result
 * returns selected post data
 */
function returnSinglePost($id)
{
    global $connection;
    $query = "SELECT * FROM posts WHERE post_id = $id";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Edit Query failed:" . mysqli_error($connection));
    } else {
        return $result;
    }
}