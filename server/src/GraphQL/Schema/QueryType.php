<?php

namespace App\GraphQL\Schema;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

use App\GraphQL\Type\CategoryType;
use App\GraphQL\Type\ProductType;

require_once __DIR__ . '/../Resolver/ProductResolver.php';
require_once __DIR__ . '/../Resolver/CategoryResolver.php';

use function App\GraphQL\Resolver\CategoryResolver;
use function App\GraphQL\Resolver\ProductsResolver;

class QueryType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Query',
            'fields' => [
                // 'echo' => [
                //     'type' => Type::string(),
                //     'args' => [
                //         'message' => ['type' => Type::string()],
                //     ],
                //     'resolve' => static fn ($rootValue, array $args): string => $rootValue['prefix'] . $args['message'],
                // ],
                'categories' => [
                    'type' => Type::listOf(new CategoryType()),
                    'resolve' => function () {
                        return CategoryResolver();
                    },
                    'description' => 'Get all categories',
                ],
                'products' => [
                    'type' => Type::listOf(new ProductType()),
                    'resolve' => function () {
                        return ProductsResolver();
                    },
                    'description' => 'Get all products',
                ]
            ],
        ]);
    }
}
