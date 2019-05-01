<?php include "includes/adminHeader.php";

if (isset($_POST['submit'])) {
    addCategories();
}

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
                        Welcome to admin panel
                        <small>Subheading</small>
                    </h1>

                    <div class="col-xs-6">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="catTitle">Add Category</label>
                                <input class="form-control" type="text" name="catTitle">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-6">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Title</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            global $connection;
                            $query = "SELECT * FROM  categories";
                            $allCategories = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_assoc($allCategories)) {
                                $id = $row['cat_id'];
                                $catTitle = $row['cat_title'];
                                ?>
                                <tr>
                                    <td><?php echo $id ?></td>
                                    <td><?php echo $catTitle ?></td>
                                </tr>
                            <?php }
                            ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- /.row -->

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
