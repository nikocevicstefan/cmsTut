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
                        Users
                        <small>Table of all users</small>
                    </h1>
                </div>
            </div>
            <!--Users table or add/edit forms-->
            <?php

            if (isset($_GET['source'])) {
                $source = $_GET['source'];
            } else {
                $source = '';
            }

            switch ($source) {
                case 'add_user';
                    include "includes/addUser.php";
                    break;
                case 'edit_user';
                    include "includes/editUser.php";
                    break;
                case 'profile';
                    include "includes/profile.php";
                    break;
                default:
                    include "includes/viewAllUsers.php";
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

