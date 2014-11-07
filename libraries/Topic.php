<?php

class Topic{
    // Init DB Variable
    private $db;

    /**
     * Constructor initializing Database Class
     */
    public function __construct(){
        $this->db = new Database();
    }


    /**
     * Get All topics
     * @return mixed
     */
    public function getAllTopics(){
        $query = "SELECT topics.*, users.username, users.avatar, categories.name";
        $query .= " From topics INNER JOIN users";
        $query .= " ON topics.user_id = users.id";
        $query .= " INNER JOIN categories";
        $query .= " ON topics.category_id = categories.id";
        $query .= " ORDER BY create_date DESC";

        $this->db->query($query);

        // Assign the result set
        $results = $this->db->resultset();
        return $results;
    }


    /**
     * Get the total number of topics
     * @return mixed
     */
    public function getTotalTopics(){
        $this->db->query("SELECT * FROM topics");
        $row = $this->db->resultset();
        return $this->db->rowCount();
    }

    /**
     * Get the total number of categories
     * @return mixed
     */
    public function getTotalCategories(){
        $this->db->query("SELECT * FROM categories");
        $row = $this->db->resultset();
        return $this->db->rowCount();
    }


    /**
     * Get all the replies and count them
     * @param $topic_id
     * @return mixed
     */
    public function getTotalReplies($topic_id){
        $this->db->query("SELECT * FROM replies WHERE topic_id = '$topic_id'");
        $row = $this->db->resultset();
        return $this->db->rowCount();
    }



    public function getByCategory($category_id){
        $query = "SELECT topics.*, users.username, users.avatar, categories.name";
        $query .= " From topics INNER JOIN categories";
        $query .= " ON topics.category_id = categories.id";
        $query .= " INNER JOIN users";
        $query .= " ON topics.user_id = users.id";
        $query .= " WHERE topics.category_id = :category_id";

        $this->db->query($query);
        $this->db->bind(':category_id', $category_id);

        // Assign the result set
        $results = $this->db->resultset();
        return $results;

    }



    /**
     * Get Category by ID
     * @param $category_id
     * @return mixed
     */
    public function getCategory($category_id){
        $this->db->query("SELECT * FROM categories WHERE id = :category_id");
        $this->db->bind(':category_id', $category_id);

        $row = $this->db->single();
        return $row;
    }


    /**
     * Get topics by ID
     * @param $id
     * @return mixed
     */
    public function getTopic($id){
        $query = "SELECT topics.*, users.username, users.name, users.avatar";
        $query .= " From topics INNER JOIN users";
        $query .= " ON topics.user_id = users.id";
        $query .= " WHERE topics.id = :id";

        $this->db->query($query);
        $this->db->bind(':id', $id);

        $row = $this->db->single();
        return $row;
    }


    /**
     * Get Topic replies
     * @param $topic_id
     * @return mixed
     */
    public function getReplies($topic_id){
        $query = "SELECT replies.*, users.*";
        $query .= " From replies INNER JOIN users";
        $query .= " ON replies.user_id = users.id";
        $query .= " WHERE replies.topic_id = :topic_id";
        $query .= " ORDER BY create_date ASC";

        $this->db->query($query);
        $this->db->bind(':topic_id', $topic_id);

        $row = $this->db->resultset();
        return $row;
    }


    /**
     * Get Topics by username
     * @param $user_id
     * @return mixed
     */
    public function getByUser($user_id){
        $query = "SELECT topics.*, users.username, users.avatar, categories.name";
        $query .= " From topics INNER JOIN categories";
        $query .= " ON topics.category_id = categories.id";
        $query .= " INNER JOIN users";
        $query .= " ON topics.user_id = users.id";
        $query .= " WHERE topics.user_id = :user_id";

        $this->db->query($query);
        $this->db->bind(':user_id', $user_id);

        // Assign the result set
        $results = $this->db->resultset();
        return $results;
    }


    /**
     * Create topic
     * @param $data
     * @return bool
     */
    public function create($data){
        //Insert Query
        $this->db->query("INSERT INTO topics (category_id, user_id, title, body, last_activity)
                                      VALUES (:category_id, :user_id, :title, :body, :last_activity)");

        //bind values
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':last_activity', $data['last_activity']);

        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }


    /**
     * Reply to topics
     * @param $data
     * @return bool
     */
    public function reply($data){
        $this->db->query("INSERT INTO replies (topic_id, user_id, body)
                                      VALUES (:topic_id, :user_id, :body)");

        // Bind values
        $this->db->bind(':topic_id', $data['topic_id']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':body', $data['body']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

}





