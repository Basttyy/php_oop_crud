<?php
class Database{
    //Specify your own database credentials
    private $host = "localhost";
    private $db_name = "php_oop_crud";
    private $username = "root";
    private $password = "123456";
    public $conn;

    //get the database connection
    public function getConnection(){
        $this->conn = null;

        try{
            //create the instance of the PDO class
            $this->conn = new PDO("mysql:host=".$this->host."; dbname=".$this->db_name, $this->username, $this->password);
            //set PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo 'connection succesful';
        }catch(PDOException $exception){
            echo "Connection failed:".$exception->getMessage();
        }
        return $this->conn;
    }
}
?>