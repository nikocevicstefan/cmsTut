<div class="col-md-4">
    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="index.php" method="post">
            <div class="input-group">
                <input type="text" name="search" class="form-control">
                <span class="input-group-btn">
                            <button class="btn btn-default" name="submit" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>

    <div class="well">
        <h4>Login</h4>
        <form action="includes/login.php" method="post">
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Your username">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Your password">
            </div>
            <input class="btn btn-default" name="login" type="submit" value="Log in">
            <a href="registration.php"><p>Sign Up if you don't have an account</p></a>
        </form>
    </div>


    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <?php
                    showCategories();
                    ?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "widget.php" ?>

</div>
