<?php
// App/GraphQL/Type/CategoryType.php

namespace App\GraphQL\Schema;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class GalleryType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Gallery',
            'fields' => [
                'id' => Type::nonNull(Type::int()),
                'product_id' => Type::nonNull(Type::string()),
                'image_url' => Type::nonNull(Type::string()),
            ],
        ]);
    }
}
