<?php require('core/init.php'); ?>

<?php
// Create a Topic Object
$topic = new Topic();

// Create a Topic Object
$validate = new Validator();

// Create a User Object
$user = new User();


// check if the form has been submitted
if(isset($_POST['register'])){
    // Create Data Array
    $data = array();
    $data['name'] = $_POST['name'];
    $data['email'] = $_POST['email'];
    $data['username'] = $_POST['username'];
    $data['password'] = md5($_POST['password']);
    $data['repassword'] = md5($_POST['repassword']);
    $data['about'] = $_POST['about_me'];
    $data['last_activity'] = date("Y-m-d H:i:s");

    // Required Fields
    $field_array = array('name', 'email', 'username', 'password', 'repassword');

    if($validate->isRequired($field_array)){
        if($validate->isValidEmail($data['email'])){
            if($validate->passwordsMatch($data['password'], $data['repassword'])){

                //Upload Avatar
                if($user->uploadAvatar()){
                    $data['avatar'] = $_FILES["avatar"]["name"];
                } else {
                    $data['avatar'] = "noimage.png";
                }

                // Register User
                if($user->register($data)){
                    redirect('index.php', 'You are registered, please log in to continue','success');
                } else {
                    redirect('index.php', 'Something went wrong','error');
                }

            }else{
                redirect('register.php', 'Your Password did not match', 'error');
            }
        }else{
            redirect('register.php', 'Please input a valid email address', 'error');
        }
    }else{
        redirect('register.php', 'Please fill all the required fields', 'error');
    }

}



// Get template and assign variable
$template = new Template('templates/register.php');



// Display the template
echo $template;