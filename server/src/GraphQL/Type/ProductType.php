<?php
// App/GraphQL/Type/CategoryType.php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

require_once __DIR__ . '/../Resolver/GalleyResolver.php';
require_once __DIR__ . '/../Resolver/PriceResolver.php';
require_once __DIR__ . '/../Resolver/AttributeResolver.php';

use function App\GraphQL\Resolver\GalleryResolver;
use function App\GraphQL\Resolver\PriceResolver;
use function App\GraphQL\Resolver\AttributeResolver;

class ProductType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Product',
            'fields' => [
                'id' => Type::nonNull(Type::string()),
                'name' => Type::nonNull(Type::string()),
                'in_stock' => Type::nonNull(Type::int()),
                'description' => Type::nonNull(Type::string()),
                'category_id' => Type::nonNull(Type::int()),
                'brand' => Type::nonNull(Type::string()),
                
                //resolve related fields
                'gallery' =>
                [
                    'type' => Type::nonNull(Type::listOf(new GalleryType())),
                    'resolve' => function ($root) {
                        return GalleryResolver($root['id']);
                    }
                ],
                'prices' => [
                    'type' => Type::nonNull(Type::listOf(new PriceType())),
                    'resolve' => function ($root) {
                        return PriceResolver($root['id']);
                    }
                ],
                'attributes' => [
                    'type' => Type::nonNull(Type::listOf(new AttributeType())),
                    'resolve' => function ($root) {
                        return AttributeResolver($root['id']);
                    }
                ],
            ],
        ]);
    }
}
