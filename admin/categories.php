<?php include "includes/adminHeader.php";

if (isset($_POST['submit'])) {
    addCategories();
} else if (isset($_GET['delete'])) {
    deleteCategory($_GET['delete']);
} else if (isset($_POST['update'])) {
    editCategory();
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
                    <!--Add categories form-->
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

                    <!--Show categories table-->
                    <div class="col-xs-6">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Title</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $allCategories = returnAllCategories();
                            while ($row = mysqli_fetch_assoc($allCategories)) {
                                $catId = $row['cat_id'];
                                $catTitle = $row['cat_title'];
                                ?>
                                <tr>
                                    <td><?php echo $catId ?></td>
                                    <td><?php echo $catTitle ?></td>
                                    <td>
                                        <div class="col-xs-6">
                                            <a href="categories.php?delete=<?php echo $catId ?>"><i
                                                        class="fa fa-close"></i></a>
                                        </div>
                                        <div class="col-xs-6">
                                            <a href="categories.php?edit=<?php echo $catId ?>"><i
                                                        class="fa fa-edit"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>

                    <!--Edit category form-->
                    <?php
                    if (isset($_GET['edit'])) {
                        include "includes/updateCategories.php";
                    }
                    ?>

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
