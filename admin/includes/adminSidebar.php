<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li>
            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i
                        class="fa fa-fw fa-files-o"></i>
                Posts <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="posts_dropdown" class="collapse">
                <li>
                    <a href="posts.php">View All Posts</a>
                </li>
                <li>
                    <a href="posts.php?source=add_post">Add Posts</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="categories.php"><i class="fa fa-fw fa-list"></i> Categories</a>
        </li>
        <li class="active">
            <a href="comments.php"><i class="fa fa-fw fa-comment"></i> Comments</a>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-fw fa-group"></i>
                Users <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="users" class="collapse">
                <li>
                    <a href="users.php">View All Users</a>
                </li>
                <li>
                    <a href="users.php?source=add_user">Add user</a>
                </li>
            </ul>
        </li>
        <li>
            <?php $id = $_SESSION['user_id'];
                echo "<a href='users.php?source=profile&u_id=$id'><i class='fa fa-fw fa-user'></i> Profile</a>"
            ?>
        </li>
    </ul>
</div>
