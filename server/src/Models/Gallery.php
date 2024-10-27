<?php
// models/Category.php

namespace App\Models;

use PDO;

class Gallery {
    private $conn;
    private $table = 'galleries';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllGalleries() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}