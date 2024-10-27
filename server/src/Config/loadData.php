<?php

use App\Config\Database;

// Create a new database connection
$db = new Database();
$connection = $db->getConnection(); // Assuming this method connects and returns the connection

// Load JSON data
$jsonData = file_get_contents('path/to/your/data.json'); // Adjust the path
$data = json_decode($jsonData, true);

// Prepare SQL statements
$insertCategory = $connection->prepare("INSERT INTO categories (name) VALUES (:name)");
$insertProduct = $connection->prepare("INSERT INTO products (id, name, inStock, description, category, brand) VALUES (:id, :name, :inStock, :description, :category, :brand)");
$insertGallery = $connection->prepare("INSERT INTO galleries (imageUrl, product_id) VALUES (:imageUrl, :product_id)");
$insertAttribute = $connection->prepare("INSERT INTO attributes (id, name, type) VALUES (:id, :name, :type)");
$insertAttributeItem = $connection->prepare("INSERT INTO attribute_items (id, displayValue, value, attribute_id) VALUES (:id, :displayValue, :value, :attribute_id)");
$insertPrice = $connection->prepare("INSERT INTO prices (amount, currency_label, currency_symbol, product_id) VALUES (:amount, :currency_label, :currency_symbol, :product_id)");

foreach ($data['data']['categories'] as $category) {
    $insertCategory->execute([':name' => $category['name']]);
}

foreach ($data['data']['products'] as $product) {
    // Insert product
    $insertProduct->execute([
        ':id' => $product['id'],
        ':name' => $product['name'],
        ':inStock' => $product['inStock'],
        ':description' => $product['description'],
        ':category' => $product['category'],
        ':brand' => $product['brand']
    ]);

    // Insert gallery images
    foreach ($product['gallery'] as $imageUrl) {
        $insertGallery->execute([':imageUrl' => $imageUrl, ':product_id' => $product['id']]);
    }

    // Insert attributes
    foreach ($product['attributes'] as $attribute) {
        $insertAttribute->execute([':id' => $attribute['id'], ':name' => $attribute['name'], ':type' => $attribute['type']]);
        $attributeId = $attribute['id']; // Adjust this if necessary to match your attribute IDs

        // Insert attribute items
        foreach ($attribute['items'] as $item) {
            $insertAttributeItem->execute([
                ':id' => $item['id'],
                ':displayValue' => $item['displayValue'],
                ':value' => $item['value'],
                ':attribute_id' => $attributeId
            ]);
        }
    }

    // Insert prices
    foreach ($product['prices'] as $price) {
        $insertPrice->execute([
            ':amount' => $price['amount'],
            ':currency_label' => $price['currency']['label'],
            ':currency_symbol' => $price['currency']['symbol'],
            ':product_id' => $product['id']
        ]);
    }
}

echo "Data imported successfully!";
