<?php

/**
 * Get all the replies by id and count them
 * @param $topic_id
 * @return mixed
 */
function replyCount($topic_id){
    $db = new Database();
    $db->query("SELECT * FROM replies WHERE topic_id = :topic_id");
    $db->bind(':topic_id', $topic_id);
    // Assign Row
    $rows = $db->resultset();
    // Get Count
    return $db->rowCount();
}


/**
 * Get everything from categories
 * @return mixed
 */
function getCategories(){
    $db = new Database();
    $db->query("SELECT * FROM categories");
    // Assign Result set
    $results = $db->resultset();
    return $results;
}


/**
 * User posts count
 * @param $user_id
 * @return mixed
 */
function  userPostCount($user_id){
    $db = new Database();
    $db->query('SELECT * FROM topics WHERE user_id = :user_id');
    $db->bind(':user_id', $user_id);

    $rows = $db->resultset();
    // Get Count
    $topic_count = $db->rowCount();

    $db->query('SELECT * FROM replies WHERE user_id = :user_id');
    $db->bind(':user_id', $user_id);

    // Assign Result set
    $results = $db->resultset();
    // Get Count
    $reply_count = $db->rowCount();
    return $topic_count + $reply_count;
}