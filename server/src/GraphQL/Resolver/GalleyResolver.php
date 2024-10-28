<?php

namespace App\GraphQL\Resolver;

use App\Config\Database;
use App\Models\Gallery;
use Exception;

function GalleryResolver($productId)
{
    try {
        $database = new Database();
        $db = $database->getConnection();
        $gallery = new Gallery($db);
        return $gallery->getAllGalleriesById($productId);
    } catch (Exception $e) {
        error_log("Error in GalleryResolver: " . $e->getMessage());
        return null; 
    }
}
