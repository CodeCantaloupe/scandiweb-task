<?php
// App/GraphQL/Type/CategoryType.php

namespace App\GraphQL\Schema;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class ProductType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Product',
            'fields' => [
                'id' => Type::nonNull(Type::int()),
                'name' => Type::nonNull(Type::string()),
                'description' => Type::nonNull(Type::string()),
                'in_stock' => Type::nonNull(Type::int()),
                'category_id' => Type::nonNull(Type::int()),
                'brand' => Type::nonNull(Type::string()),
            ],
        ]);
    }
}
