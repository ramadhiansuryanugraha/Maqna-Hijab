<?php
class Database{
    private $host;
    private $user;
    private $pass;
    private $db;
    public $conn;

    function __construct($host, $user, $pass, $db){
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;

        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db) or die(mysqli_error());
        if(!@$this->conn){
            return false;
        }else{
            return true;
        }
    }
}
?>