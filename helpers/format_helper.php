<?php

/**
 * Beautify date
 * @param $date
 */
function formatDate($date){
    $date = date("F j, Y, g:i a",strtotime($date));
    return $date;
}


/**
 * Create a url from a string
 * @param $str
 */
function urlFormat($str){
    // strip out all the whitespaces
    $str = preg_replace('/\s*/', '', $str);
    // Convert it to lowercase
    $str = strtolower($str);
    // URL Encode
    $str = urlencode($str);
    return $str;
}


/**
 * Add Bootstrap classname active if category is active
 * @param $category
 * @return string
 */
function is_active($category){
    if(isset($_GET['category'])){
        if($_GET['category'] == $category){
            return 'active';
        } else {
            return '';
        }
    } else {
        if($category == null){
            return 'active';
        }
    }
}












