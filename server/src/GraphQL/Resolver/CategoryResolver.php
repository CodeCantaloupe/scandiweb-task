<?php

namespace App\GraphQL\Resolver;

use App\Config\Database;
use App\Models\Category;
use Exception;

function CategoryResolver()
{
    try {
        $database = new Database();
        $db = $database->getConnection();
        $category = new Category($db);
        return $category->getAllCategories();
    } catch (Exception $e) {
        error_log("Error in categoryResolver: " . $e->getMessage());
        return null; 
    }
}
