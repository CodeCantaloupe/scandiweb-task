<?php
// models/Category.php

namespace App\Models;

use PDO;

class Price
{
    private $conn;
    private $table = 'prices';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAllPrices()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
