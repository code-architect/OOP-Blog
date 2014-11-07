<?php require('core/init.php'); ?>

<?php
// Create a Topic Object
$topic = new Topic();

// Get category from URL
$category = isset($_GET['category']) ? $_GET['category'] : null;

// Get user from URL
$user_id = isset($_GET['user']) ? $_GET['user'] : null;

// Get template and assign variable
$template = new Template('templates/topics.php');

// Assign Template variables
if(isset($category)){
    $template->topics = $topic->getByCategory($category);
    $template->title = 'Posts In "'.$topic->getCategory($category)->name.'"';
}

// Check for user filter
if(isset($user_id)){
    $template->topics = $topic->getByUser($user_id);
    //$template->title = 'Posts By "'.$user->getUser($user_id)->username.'"';
}

// If there is no category id and user id
if(!isset($category) && !isset($user_id)){
    $template->topics = $topic->getAllTopics();
}
$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories =  $topic->getTotalCategories();


// Display the template
echo $template;