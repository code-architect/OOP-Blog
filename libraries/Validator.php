<?php

class Validator{

    /**
     * Check Required fields
     * @param $field_array
     * @return bool
     */
    public function isRequired($field_array){
        foreach($field_array as $field){
            if($_POST[''.$field.''] == ''){
                return false;
            }
        }
        return true;
    }


    /**
     * Simple email Validation
     * @param $email
     * @return bool
     */
    public function isValidEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
    }


    /**
     * Check two passwords
     * @param $pw1
     * @param $pw2
     * @return bool
     */
    public function passwordsMatch($pw1, $pw2){
        if($pw1 == $pw2){
            return true;
        }else{
            return false;
        }
    }



}