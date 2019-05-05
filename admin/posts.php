<?php
include "includes/adminHeader.php";
?>

<body>

<div id="wrapper">

    <!--Navigation-->
    <?php
    include "includes/adminNavigation.php";
    ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Posts
                        <small>Table of all posts</small>
                    </h1>
                </div>
            </div>
            <!--Posts table-->
            <?php
            if (isset($_GET['source'])) {
                $source = $_GET['source'];
            } else {
                $source = '';
            }

            switch ($source) {
                case 'add_post';
                    include "includes/addPost.php";
                    break;
                case 'edit_post';
                    include "includes/editPost.php";
                    break;

                default:
                    include "includes/viewAllPosts.php";
                    break;
            }
            ?>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>

