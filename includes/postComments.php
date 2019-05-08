<div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="http://placehold.it/64x64" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading"><?php echo $comment['comment_author'];?>
            <small><?php echo $comment['comment_date']?></small>
        </h4>
        <?php echo $comment['comment_content'];?>
    </div>
</div>