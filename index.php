<?php
include "includes/header.php";
include "includes/db.php";
include "includes/functions.php";
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

            <!-- Blog Posts -->
            <!--<h2>
                <a href="#">Blog Post Title</a>
            </h2>
            <p class="lead">
                by <a href="index.php">Start Bootstrap</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM</p>
            <hr>
            <img class="img-responsive" src="http://placehold.it/900x300" alt="">
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus
                inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum
                officiis rerum.</p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>-->

            <?php
            if (isset($_POST['submit'])) {
                //if search is activated
                $search = $_POST['search'];
                $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' AND post_status = 'submitted'";
            } else if (isset($_GET['category'])) {
                $catId = $_GET['category'];
                $query = "SELECT * FROM posts WHERE post_category_id = $catId  AND post_status = 'submitted'";
            } else {
                //show all posts
                $query = "SELECT * FROM posts WHERE post_status = 'submitted'";
            }

            //if query finds no results then echo relevant info
            //otherwise show relevant posts
            $result = mysqli_query($connection, $query);
            if (mysqli_num_rows($result)) {
                showPosts($query);
            } else {
                echo "<h3>No posts found</h3>";
            }
            ?>


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
