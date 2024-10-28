<?php

use App\Config\Database;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Attribute;
use App\Models\AttributeItem;
use App\Models\Product;
use App\Models\Price;

require_once __DIR__ . '/../Config/Database.php';
require_once __DIR__ . '/Category.php';
require_once __DIR__ . '/Gallery.php';
require_once __DIR__ . '/Attribute.php';
require_once __DIR__ . '/AttributeItem.php';
require_once __DIR__ . '/Product.php';
require_once __DIR__ . '/Price.php';


// Initialize Database connection
$database = new Database();
$db = $database->getConnection();

// Initialize Category model
$category = new Category($db);
$gallery = new Gallery($db);
$attribute = new Attribute($db);
$attributeItem = new AttributeItem($db);
$product = new Product($db);
$price = new Price($db);

// Fetch all categories
$categories = $category->getAllCategories();
$gallery = $gallery->getAllGalleries();
$attribute = $attribute->getAllAttributes();
$attributeItem = $attributeItem->getAllAttributeItems();
$product = $product->getAllProducts();
$price = $price->getAllPrices();

// Display the result
echo "<pre>";
print_r($categories);
print_r($gallery);
print_r($attribute);
print_r($attributeItem);
print_r($product);
print_r($price);
echo "</pre>";
