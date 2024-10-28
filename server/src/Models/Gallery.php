<?php
// models/Category.php

namespace App\Models;

use PDO;
use PDOException;

class Gallery
{
    private $conn;
    private $table = 'galleries';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAllGalleriesById($productId)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE product_id = :product_id"; // Use prepared statements
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':product_id', $productId); // Bind parameter
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            error_log("Error in getAllGalleriesById: " . $e->getMessage());
            return []; // or throw a custom exception
        }
    }
}
