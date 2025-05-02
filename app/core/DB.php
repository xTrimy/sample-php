<?php
namespace App\Core;

use mysqli;

class DB{
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        $this->connection = new mysqli("localhost", "root", "", "sample_db");

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new DB();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
    
    public function query($sql, $params = [])
    {
        $stmt = $this->connection->prepare($sql);
        if ($params) {
            $stmt->bind_param(str_repeat('s', count($params)), ...$params);
        }
        $stmt->execute();
        if($sql[0] == 'S'){
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }
        if($sql[0] == 'I'){
            return $stmt->insert_id;
        }
        if($sql[0] == 'U' || $sql[0] == 'D'){
            return $stmt->affected_rows;
        }
        if($sql[0] == 'C'){
            return $stmt->affected_rows;
        }
        return $stmt->get_result();
    }
}