<?php
class User{

    // Init DB Variable
    private $db;

    /**
     * Constructor initializing Database Class
     */
    public function __construct(){
        $this->db = new Database();
    }



    /**
     * Upload the avatar image
     * @return bool
     */
    public function uploadAvatar(){
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $_FILES["avatar"]["name"]);
        $extension = end($temp);

        if((($_FILES["avatar"]["type"] == "image/gif")
            || ($_FILES["avatar"]["type"] == "image/jpeg")
            || ($_FILES["avatar"]["type"] == "image/jpg")
            || ($_FILES["avatar"]["type"] == "image/pjpeg")
            || ($_FILES["avatar"]["type"] == "image/x-png")
            || ($_FILES["avatar"]["type"] == "image/png"))
            && ($_FILES["avatar"]["size"] < 20000)
            && in_array($extension, $allowedExts)){
            // Error handling
            if($_FILES["avatar"]["error"] > 0){
                redirect('register.php', $_FILES["avatar"]["error"], 'error');
            } else {
                if(file_exists("images/avatars/" . $_FILES["avatar"]["name"])) {
                    redirect('register.php', 'File already exists', 'error');
                } else {
                    move_uploaded_file($_FILES["avatar"]["tmp_name"], "images/avatars/" . $_FILES["avatar"]["name"]);
                    return true;
                }
            }
        } else {
            redirect('register.php', 'Invalid File type', 'error');
        }
    }


    /**
     * Register new user
     * @param $data
     * @return bool
     */
    public function register($data){
        // Insert Query
        $this->db->query('INSERT INTO users (name, email, avatar, username, password, about, last_activity)
                                     VALUES (:name, :email, :avatar, :username, :password, :about, :last_activity)');

        // Bind Values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':avatar', $data['avatar']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':about', $data['about']);
        $this->db->bind(':last_activity', $data['last_activity']);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }


    /**
     * User Login
     * @param $username
     * @param $password
     * @return bool
     */
    public function login($username, $password){
        $this->db->query("SELECT * FROM users WHERE username = :username AND password = :password");

        // Bind Values
        $this->db->bind(':username', $username);
        $this->db->bind(':password', $password);

        $row = $this->db->single();

        // Check Rows
        if($this->db->rowCount() > 0){
            $this->setUserData($row);
            return true;
        } else{
            return false;
        }
    }


    /**
     * Set user data to session
     * @param $row
     */
    private function setUserData($row){
        $_SESSION['is_logged_in'] = true;
        $_SESSION['user_id'] = $row->id;
        $_SESSION['username'] = $row->username;
        $_SESSION['name'] = $row->name;
    }


    /**
     * user logout
     * @return bool
     */
    public function logout(){
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['name']);
        return true;
    }


    /**
     * Get total number of users
     * @return mixed
     */
    public function getTotalUser(){
        $this->db->query('SELECT * FROM users');
        $rows = $this->db->resultset();
        return $this->db->rowCount();
    }


}

