<?php
//    return a category based on a get parameter (cat_id)
    $category =  mysqli_fetch_assoc(returnCategory($_GET['edit']));
?>
<div class="col-xs-6">
    <form action="" method="post">
        <div class="form-group">
            <label for="catTitleEdit">Edit Category</label>
            <input class="form-control" type="text" name="catTitleEdit"
                   value="<?php echo $category['cat_title']; ?>">
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="update" value="Edit Category">
        </div>
    </form>
</div>
