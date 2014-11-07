<?php
/**
 * Redirect to pages
 * @param bool $page
 * @param null $message
 * @param null $message_type
 */
function redirect($page = false, $message = null, $message_type = null){
    if(is_string($page)){
        $location = $page;
    } else {
        $location = $_SERVER['SCRIPT_NAME'];
    }

    // Check if there is any message
    if($message != null){
        // Set message to session
        $_SESSION['message'] = $message;
    }

    // Check for the type
    if($message_type != null){
        // Set message type to session
        $_SESSION['message_type'] = $message_type;
    }

    // Redirect
    header('Location: '.$location);
    exit;
}


/**
 *  Display Message
 */
function displayMessage(){
    if(!empty($_SESSION['message'])){

        // Assign Message
        $message = $_SESSION['message'];

        if(!empty($_SESSION['message_type'])){
            // Assign Type Var
            $message_type = $_SESSION['message_type'];
            // Create output
            if($message_type == 'error'){
                echo '<div class="alert alert-danger">' . $message .'</div>';
            } else {
                echo '<div class="alert alert-success">' . $message .'</div>';
            }
        }
        // Unset Message
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    }else{
        echo '';
    }
}


/**
 * Check if the user is Logged In
 * @return bool
 */
function isLoggedIn(){
    if(isset($_SESSION['is_logged_in'])){
        return true;
    } else {
        return false;
    }
}


/**
 * Get logged In User Data Info
 * @return mixed
 */
function getUser(){
    $userArray['user_id'] = $_SESSION['user_id'];
    $userArray['username'] = $_SESSION['username'];
    $userArray['name'] = $_SESSION['name'];
    return $userArray;
}








