<?php
// src/Config/Database.php

namespace App\Config;

use PDO;
use PDOException;

class Database
{
    private $host = 'localhost';  // Change this if needed
    private $port = '3306';        // Port for MySQL
    private $db_name = 'scandiweb_task';
    private $username = 'root';
    private $password = '';
    public $conn;

    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};port={$this->port};dbname={$this->db_name}",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }

        return $this->conn;
    }
}
