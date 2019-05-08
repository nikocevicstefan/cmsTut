<?php
include "includes/header.php";
include "includes/db.php";
include "includes/functions.php";

if (isset($_POST['submitComment'])) {
    createComment($_GET['p_id']);
}
?>

<body>
<!-- Navigation -->
<?php include "includes/navigation.php"; ?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>


            <?php
            if (isset($_GET['p_id'])) {
                //if search is activated
                $postId = $_GET['p_id'];
                $query = "SELECT * FROM posts WHERE post_id = $postId";
                showPosts($query);
            }
            ?>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form" method="post">

                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="commentContent"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="commentAuthor">Your Name:</label>
                        <input type="text" class="form-control" name="commentAuthor">
                    </div>
                    <div class="form-group">
                        <label for="commentEmail">Your email:</label>
                        <input type="text" class="form-control" name="commentEmail">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submitComment">Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->

            <!-- Comment -->
            <?php
            $comments = readPostComments();
            while ($comment = mysqli_fetch_assoc($comments)) {
                include "includes/postComments.php";
            }
            ?>


            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php"; ?>
    </div>
    <!-- /.row -->

    <hr>
    <!--    include the footer-->
    <?php include "includes/footer.php" ?>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
