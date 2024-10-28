<?php
// App/GraphQL/Type/CategoryType.php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

require_once __DIR__ . '/../Resolver/AttributeItemResolver.php';

use function App\GraphQL\Resolver\AttributeItemResolver;

class AttributeType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Attributes',
            'fields' => [
                'id' => Type::nonNull(Type::int()),
                'product_id' => Type::nonNull(Type::string()),
                'items' => [
                    'type' => Type::nonNull(Type::listOf(new AttributeItemType())),
                    'resolve' => function ($root) {
                        return AttributeItemResolver($root['id']);
                    }
                ],
                'name' => Type::nonNull(Type::string()),
                'type' => Type::nonNull(Type::string()),
            ],
        ]);
    }
}
