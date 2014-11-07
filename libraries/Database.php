<?php
/**
 * Created by Indranil Samanta.
 * User: Common
 * Date: 12/10/14
 * Time: 13:18
 */
class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private $error;
    private $stmt;

    public function __construct(){
        // Set DSN
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;
        // Set Options
        $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // Create a new PDO instance
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }   //catch any error
        catch(PDOException $e){
            $this->error = $e->getMessage();
        }
    }



    /**
     * -------------------------------------------------------------------------------------------------
     * @param $query string
     * Query Function
     */
    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }


    /**
     * --------------------------------------------------------------------------------------------------
     * Binding the given values of the query
     * @param $param
     * @param $value
     * @param null $type
     */
    public function bind($param, $value, $type = null){
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }


    /**
     * Executing the query and returning the results
     * @return mixed
     */
    public function execute(){
        return $this->stmt->execute();
    }


    public function resultset(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }


    public function rowCount(){
        return $this->stmt->rowCount();
    }


    public function lastInsertId(){
        return $this->stmt->lastInsertId();
    }


    public function beginTransaction(){
        return $this->stmt->beginTransaction();
    }


    public function endTransaction(){
        return $this->stmt->commit();
    }


    public function cancelTransaction(){
        return $this->stmt->rollBack();
    }




}















