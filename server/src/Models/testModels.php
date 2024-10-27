<?php

use App\Config\Database;
use App\Models\Category;
use App\Models\Gallery;

require_once __DIR__ . '/../Config/Database.php';
require_once __DIR__ . '/Category.php';
require_once __DIR__ . '/Gallery.php';


// Initialize Database connection
$database = new Database();
$db = $database->getConnection();

// Initialize Category model
$category = new Category($db);
$gallery = new Gallery($db);

// Fetch all categories
$categories = $category->getAllCategories();
$gallery = $gallery->getAllGalleries();

// Display the result
echo "<pre>";
print_r($categories);
print_r($gallery);
echo "</pre>";
