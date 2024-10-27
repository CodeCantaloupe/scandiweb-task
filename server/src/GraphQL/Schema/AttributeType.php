<?php
// App/GraphQL/Type/CategoryType.php

namespace App\GraphQL\Schema;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class AttributeType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Attributes',
            'fields' => [
                'id' => Type::nonNull(Type::int()),
                'product_id' => Type::nonNull(Type::string()),
                'name' => Type::nonNull(Type::string()),
                'type' => Type::nonNull(Type::string()),
            ],
        ]);
    }
}
