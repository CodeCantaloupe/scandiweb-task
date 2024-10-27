<?php
// testConnection.php

require_once 'src/Config/Database.php';

use App\Config\Database;

// Create an instance of the Database class
$db = new Database();

// Attempt to connect to the database
$conn = $db->getConnection();

if ($conn) {
    echo "Connected successfully to the database.";
} else {
    echo "Connection failed.";
}
