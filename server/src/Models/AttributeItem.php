<?php
// models/Category.php

namespace App\Models;

use PDO;

class AttributeItem
{
    private $conn;
    private $table = 'attribute_items';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAllAttributeItems()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
