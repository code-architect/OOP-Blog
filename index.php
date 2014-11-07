<?php require('core/init.php'); ?>

<?php
// Create Topic Object
$topic = new Topic();

// Create Topic Object
$user = new User();

// Get template and assign variable
$template = new Template('templates/frontpage.php');

// Assign variables
$template->topics = $topic->getAllTopics();
$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories =  $topic->getTotalCategories();
$template->totalUsers =  $user->getTotalUser();

// Display the template
echo $template;