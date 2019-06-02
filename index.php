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


            <?php
            //number of posts
            $count = mysqli_num_rows(returnAllPosts());
            //number of pages with 5 posts each
            $pagePosts = 5;
            $pageNum = 1;
            $pageCount = ceil($count / $pagePosts);


            if (isset($_POST['submit'])) {
                //if search is activated
                $search = $_POST['search'];
                $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' AND post_status = 'submitted'";
            } else if (isset($_GET['category'])) {
                $catId = $_GET['category'];
                $query = "SELECT * FROM posts WHERE post_category_id = $catId  AND post_status = 'submitted'";
            } else if (isset($_GET['author'])) {
                $author = $_GET['author'];
                $query = "SELECT * FROM posts WHERE post_author = '$author' AND post_status = 'submitted'";
            } else if (isset($_GET['page'])) {
                $pageNum = $_GET['page'];
                $postsIndex = $pageNum - 1;
                $query = "SELECT * FROM posts WHERE post_status = 'submitted' ORDER BY post_id DESC LIMIT $postsIndex, $pagePosts";
            } else {
                //show all posts
                $query = "SELECT * FROM posts WHERE post_status = 'submitted' ORDER BY post_id DESC LIMIT $pagePosts";
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

    <ul class="pagination">
        <?php
        for ($i = 1; $i <= $pageCount; $i++) {
            if ($i == $pageNum) {
                echo "<li class='page-item'><a class='active_link' href='index.php?page=$i'>$i</a></li>";
            } else {
                echo "<li class='page-item'><a href='index.php?page=$i'>$i</a></li>";
            }
        }
        ?>
    </ul>

    <hr>
    <!--    include the footer-->
    <?php include "includes/footer.php" ?>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/scripts.js" type="text/javascript"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
