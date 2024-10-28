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

    public function getPricesById($productId)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE product_id = :product_id"; // Use prepared statements
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':product_id', $productId); // Bind parameter
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            error_log("Error in getPricesById: " . $e->getMessage());
            return []; 
        }
    }
}
