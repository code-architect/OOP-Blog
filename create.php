<?php require('core/init.php'); ?>

<?php
// Create a Topic Object
$topic = new Topic();

// Create a Topic Object
$validate = new Validator();

// Create a User Object
$user = new User();

// Checking if posted
if(isset($_POST['do_create'])){
    // Create data Array
    $data = array();
    $data['title'] = $_POST['title'];
    $data['body'] = $_POST['body'];
    $data['category_id'] = $_POST['category'];
    $data['user_id'] = getUser()['user_id'];
    $data['last_activity'] = date("Y-m-d H:i:s");

    // Required Fields
    $field_array = array('title', 'category', 'body');

    if($validate->isRequired($field_array)){
        if($topic->create($data)){
            redirect('index.php', 'Your Topic has been posted', 'success');
        }else{
            redirect('topic.php?id='.$topic_id, 'Something went wrong', 'error');
        }
    } else {
        redirect('create.php', 'Please fill in the required fields', 'error');
    }
}



// Get template and assign variable
$template = new Template('templates/create.php');


// Display the template
echo $template;