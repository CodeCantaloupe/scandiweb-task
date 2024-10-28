<?php

namespace App\GraphQL\Resolver;

use App\Config\Database;
use App\Models\AttributeItem;
use Exception;

function AttributeItemResolver($productId)
{
    try {
        $database = new Database();
        $db = $database->getConnection();
        $attributeItem = new AttributeItem($db);
        return $attributeItem->getAttributeItemsById($productId);
    } catch (Exception $e) {
        error_log("Error in AttributeItemResolver: " . $e->getMessage());
        return null; 
    }
}
