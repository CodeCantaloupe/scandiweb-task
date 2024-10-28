<?php

namespace App\GraphQL\Resolver;

use App\Config\Database;
use App\Models\Attribute;
use Exception;

function AttributeResolver($productId)
{
    try {
        $database = new Database();
        $db = $database->getConnection();
        $attribute = new Attribute($db);
        return $attribute->getAttributesById($productId);
    } catch (Exception $e) {
        error_log("Error in AttributeResolver: " . $e->getMessage());
        return null; 
    }
}
