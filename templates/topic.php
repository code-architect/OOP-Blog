<?php include('includes/header.php'); ?>



<ul id="topics">

    <li id="main-topic" class="topic topic">
        <div class="row">
            <div class="col-md-2">
                <div class="user-info">
                    <img class="avatar pull-left" src="<?php echo BASE_URL; ?>/images/avatars/<?php echo $topic->avatar; ?>" />
                    <ul>
                        <li><strong><?php echo $topic->username; ?></strong></li>
                        <li><?php echo userPostCount($topic->user_id); ?> posts</li>
                        <li><a href="<?php echo BASE_URL; ?>topics.php?user=<?php echo $topic->user_id; ?>">Profile</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10">
                <div class="topic-content pull-right">
                    <p><?php echo $topic->body; ?></p>
                    <div>
                        <span class="badge"><?php echo formatDate($topic->create_date); ?></span>
                            <div class="pull-right"></span> <span class="label label-info"><?php echo $topic->name; ?></span></div>

                    </div>
                </div>
            </div>
        </div>
    </li>

    <!-- Topic Reply -->
    <?php foreach($replies as $reply){ ?>
    <li class="topic topic">
        <div class="row">
            <div class="col-md-2">
                <div class="user-info">
                    <img class="avatar pull-left" src="<?php echo BASE_URL; ?>/images/avatars/<?php echo $reply->avatar; ?>" />
                    <ul>
                        <li><strong><?php echo $reply->username; ?></strong></li>
                        <li><?php echo userPostCount($reply->user_id); ?> posts</li>
                        <li><a href="<?php echo BASE_URL; ?>topics.php?user=<?php echo $reply->user_id; ?>">Profile</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10">
                <div class="topic-content pull-right">
                    <p><?php echo $reply->body; ?></p>
                    <div>
                        <span class="badge"><?php echo formatDate($reply->create_date); ?></span>
                        <div class="pull-right"></span> <span class="label label-info"><?php echo $reply->name; ?></span></div>

                    </div>
                </div>
            </div>
        </div>
    </li>
    <?php } ?>

    <!-- Topic Reply Ends -->


</ul>
<h3>Reply to Topic</h3>
<?php if(!isLoggedIn()) : ?>
    <h4>Please login to reply</h4>
<?php else : ?>
<form role="form" method="post" action="topic.php?id=<?php echo $topic->id; ?>">
    <div class="form-group">
        <textarea id="reply" rows="10" cols="90" class="form-control" name="body"></textarea>
        <script>CKEDITOR.replace('reply');</script>
    </div>
    <button name="do_reply" type="submit" class="btn btn-default">Submit</button>
</form>
<?php endif; ?>

<?php include('includes/footer.php') ?>