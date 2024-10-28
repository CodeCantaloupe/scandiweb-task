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

    public function getAttributeItemsById($attributeId)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE attribute_id = :attribute_id"; // Use prepared statements
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':attribute_id', $attributeId); // Bind parameter
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            error_log("Error in getAttributeItemsById: " . $e->getMessage());
            return []; 
        }
    }
}
