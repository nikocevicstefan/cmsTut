<!--Receives variables from index.php-->
<h2>
    <a href="#"><?php echo "{$postTitle}"; ?></a>
</h2>
<p class="lead">
    by <a href="index.php"><?php echo "{$postAuthor}" ?></a>
</p>
<p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo "{$postDate}" ?></p>
<hr>
<img class="img-responsive" src="images/<?php echo $postImage ?>" alt="">
<hr>
<p><?php echo "{$postContent}" ?></p>
<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

<hr>
