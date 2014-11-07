<?php include'core/init.php'; ?>

<?php
if(isset($_POST['do_login'])){
    //Get the variables from post
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // Create a User Object
    $user = new User();

    if($user->login($username, $password)){
        redirect('index.php', 'You have been logged in', 'success');
    } else {
        redirect('index.php', 'Login is not valid', 'error');
    }
} else {
    redirect('index.php');
}