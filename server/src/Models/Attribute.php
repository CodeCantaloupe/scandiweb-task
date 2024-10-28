<?php
// models/Category.php

namespace App\Models;

use PDO;

class Attribute
{
    private $conn;
    private $table = 'attributes';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAllAttributes()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
