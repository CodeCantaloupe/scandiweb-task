<?php
// models/Category.php

namespace App\Models;

use PDO;

class Product
{
    private $conn;
    private $table = 'products';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAllProducts()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
