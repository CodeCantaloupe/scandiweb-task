<?php

namespace App\GraphQL\Resolver;

use App\Config\Database;
use App\Models\Price;
use Exception;

function PriceResolver($productId)
{
    try {
        $database = new Database();
        $db = $database->getConnection();
        $price = new Price($db);
        return $price->getPricesById($productId);
    } catch (Exception $e) {
        error_log("Error in PriceResolver: " . $e->getMessage());
        return null; 
    }
}
