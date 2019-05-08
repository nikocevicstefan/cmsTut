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
                        Comments
                        <small>Table of all comments</small>
                    </h1>
                </div>
            </div>
            <!--Comments table-->
           <?php
           include "includes/viewAllComments.php";

           if(isset($_GET['delete']))
           {
               $commentId = $_GET['delete'];
               deleteComment($commentId);
           }else if( isset($_GET['approval']))
           {
               $commentId = $_GET['approval'];
               approvingComment($commentId);
           }

/*            if (isset($_GET['source'])) {
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
                    include "includes/viewAllComments.php";
                    break;
            }
            */    ?>

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

