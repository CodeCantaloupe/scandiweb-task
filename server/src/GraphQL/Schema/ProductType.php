<?php
// App/GraphQL/Type/CategoryType.php

namespace App\GraphQL\Schema;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

use App\Config\Database;

require_once __DIR__ . '/CategoryType.php';
require_once __DIR__ . '/../Resolver/CategoryResolver.php';

use function App\GraphQL\Resolver\CategoryResolver;

use App\GraphQL\Schema\GalleryType;
use App\GraphQL\Schema\CategoryType;
use App\GraphQL\Schema\AttributeType;
use App\GraphQL\Schema\PriceType;

class ProductType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Product',
            'fields' => [
                'id' => Type::nonNull(Type::int()),
                'name' => Type::nonNull(Type::string()),
                'in_stock' => Type::nonNull(Type::int()),
                'description' => Type::nonNull(Type::string()),
                'brand' => Type::nonNull(Type::string()),
                
                // Resolve-related fields
                'category' => [
                    'type' => Type::listOf(new CategoryType()),
                    'resolve' => function () {
                        return CategoryResolver();
                    },
                ],
                'gallery' => Type::nonNull(Type::listOf(new GalleryType())),
                'attributes' => [
                    'type' => Type::nonNull(Type::listOf(new AttributeType())),
                ],
                'prices' => Type::nonNull(Type::listOf(new PriceType())),
            ],
        ]); 
    }
}
