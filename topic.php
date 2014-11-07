<?php require('core/init.php'); ?>

<?php
// Create a Topic Object
$topic = new Topic();

// Get ID from URL
$topic_id = $_GET['id'];


// Reply
if(isset($_POST['do_reply'])){
    $data = array();
    $data['topic_id'] = $_GET['id'];
    $data['body'] = $_POST['body'];
    $data['user_id'] = getUser()['user_id'];

    //Create object
    $validate = new Validator();

    //Required Fields
    $field_array = array('body');

    if($validate->isRequired($field_array)){
        // post reply
        if($topic->reply($data)){
            redirect('topic.php?id='.$topic_id, 'Your reply has been posted', 'success');
        } else {
            redirect('topic.php?id='.$topic_id, 'Something went wrong', 'error');
        }
    } else {
        redirect('topic.php?id='.$topic_id, 'Please type reply body to post', 'error');
    }

}

// Get template and assign variable
$template = new Template('templates/topic.php');

// Template Variables
$template->topic = $topic->getTopic($topic_id);
$template->replies = $topic->getReplies($topic_id);
$template->title = $topic->getTopic($topic_id)->title;

// Display the template
echo $template;