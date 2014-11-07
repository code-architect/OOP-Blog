</div>
</div>
</div>
<!-- Main end -->

<!-- Sidebar -->
<div class="col-md-4">
    <div id="sidebar">
        <div class="block">
            <?php if(isLoggedIn()): ?>
                <div class="userdata">
                    Welcome, <?php echo getUser()['username']; ?>
                </div>
                <br>
                <form role="form" method="post" action="logout.php">
                    <input type="submit" value="Logout" name="do_logout" class="btn btn-primary">
                </form>
            <?php else : ?>
            <h3>login Form</h3>
            <form role="form" method="post" action="login.php">
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" type="text" class="form-control" id="username" placeholder="Enter Your Username">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
                <button name="do_login" type="submit" class="btn btn-primary">Login</button>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-default" href="register.php">Register</a>
            </form>
            <?php endif; ?>
        </div>

        <div class="block">
            <h3>Categories</h3>
            <div class="list-group">
                <a href="topics.php" class="list-group-item <?php echo is_active(null); ?>">All Topics <span class="badge pull-right">14</span></a>
                <?php foreach(getCategories() as $category){ ?>
                    <a href="topics.php?category=<?php echo $category->id; ?>" class="list-group-item <?php echo is_active($category->id); ?>"><?php echo $category->name; ?></a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- Sidebar Ends -->
</div>
</div><!-- /.container -->
<br/>
<div class="blog-footer">
    <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
    <p>
        <a href="#">Back to top</a>
    </p>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?php echo BASE_URL; ?>/templates/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
