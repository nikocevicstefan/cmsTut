<!--Receives variables from index.php-->
<h2>
    <a href="post.php?p_id=<?php echo $postId; ?>"><?php echo "{$postTitle}"; ?></a>
</h2>
<p class="lead">
    by <a href="index.php?author=<?php echo "{$postAuthor}"?>"><?php echo "{$postAuthor}" ?></a>
</p>
<p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo "{$postDate}" ?></p>
<hr>
<a href="post.php?p_id=<?php echo $postId ?>">
    <img class="img-responsive" src="images/<?php echo $postImage ?>" alt="">
</a>
<hr>
<p><?php echo "{$postContent}" ?></p>
<?php
if (empty($_GET['p_id'])){
    echo "<a class='btn btn-primary' href='post.php?p_id=$postId'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>";
}
?>
<hr>
