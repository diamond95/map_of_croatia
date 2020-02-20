<?php
/**
 * Description of class Prikaz
 *
 * @author Ivan Miljanic <ivanvk95@gmail.com>
 */

class Prikaz {

    public $conn;

    
    public function __construct($connection) {
        
        $this->conn = $connection;
    }

    public function getStatsByDate($date) : array {

        $query = "SELECT * FROM `county_stats` as c LEFT JOIN county as co ON c.county_id = co.county_id WHERE c.stats_date = '$date' ORDER BY c.stats_id ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

   
}