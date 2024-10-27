<?php
// App/GraphQL/Type/CategoryType.php

namespace App\GraphQL\Schema;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class PriceType extends ObjectType {
    public function __construct() {
        parent::__construct([
            'name' => 'Price',
            'fields' => [
                'id' => Type::nonNull(Type::int()),
                'product_id' => Type::nonNull(Type::string()),
                'amount' => Type::nonNull(Type::float()),
                'currency_label' => Type::nonNull(Type::string()),
                'currency_symbol' => Type::nonNull(Type::string()),
            ],
        ]);
    }
}
