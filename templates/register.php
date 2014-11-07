<?php include('includes/header.php'); ?>
<?php if(isLoggedIn()) : ?>

    <?php redirect('index.php'); ?>

<?php else : ?>


    <form role="form" enctype="multipart/form-data" method="post" >

        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your User-name">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="repassword">Re-Type Password</label>
            <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="avatar">Upload Avatar</label>
            <input type="file" id="avatar" name="avatar">
            <p class="help-block">.png, .jpeg format preferable</p>
        </div>
        <div class="form-group">
            <label for="about_me">About Me</label>
            <textarea class="form-control" id="about_me" name="about_me" rows="3"></textarea>

        </div>
        <input name="register" type="submit" class="btn btn-primary" value="Register Me" >

    </form>

<?php endif; ?>

<?php include('includes/footer.php') ?>