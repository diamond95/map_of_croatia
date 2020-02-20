<?php
/**
 * Description of Connection
 *
 * @author Ivan Miljanic <ivanvk95@gmail.com>
 */
class Connection {

    private $host = "localhost";
    private $db_name = "novatv";
    private $username = "root";
    private $password = "";


    public $conn;
  
    
    public function __construct() {
        $this->conn = null;
        
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (PDOException $exception) {
            echo "Dogodila se pogreška s spajanjem na bazu."; //. $exception->getMessage();
            
        }
    }
    
    public function conn() {
        if ($this->conn instanceof PDO){
            return $this->conn;
        }
    }
        
}
