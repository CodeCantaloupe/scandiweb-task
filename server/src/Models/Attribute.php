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

    public function getAttributesById($productId)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE product_id = :product_id"; // Use prepared statements
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':product_id', $productId); // Bind parameter
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            error_log("Error in getAttributesById: " . $e->getMessage());
            return []; 
        }
    }
}
