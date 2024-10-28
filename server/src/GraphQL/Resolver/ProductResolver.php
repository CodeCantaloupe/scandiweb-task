<?php

namespace App\GraphQL\Resolver;

use App\Config\Database;
use App\Models\Product;
use Exception;

function ProductsResolver()
{
    try {
        $database = new Database();
        $db = $database->getConnection();
        $product = new Product($db);
        return $product->getAllProducts();
    } catch (Exception $e) {
        error_log("Error in productsResolver: " . $e->getMessage());
        return null; 
    }
}
