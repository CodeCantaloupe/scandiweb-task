<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use App\GraphQL\Schema\CategoryType;
use App\GraphQL\Schema\GalleryType;
use App\Config\Database;
use App\Models\Category;
use App\Models\Gallery;


class QueryType extends ObjectType {
    public function __construct() {
        parent::__construct([
            'name' => 'Query',
            'fields' => [
                'echo' => [
                    'type' => Type::string(),
                    'args' => [
                        'message' => ['type' => Type::string()],
                    ],
                    'resolve' => static fn ($rootValue, array $args): string => $rootValue['prefix'] . $args['message'],
                ],
                'categories' => [
                    'type' => Type::listOf(new CategoryType()),
                    'resolve' => function() {
                        $database = new Database();
                        $db = $database->getConnection();
                        $category = new Category($db);
                        return $category->getAllCategories();
                    }
                ],
                'galleries' => [
                    'type' => Type::listOf(new GalleryType()),
                    'resolve' => function() {
                        $database = new Database();
                        $db = $database->getConnection();
                        $gallery = new Gallery($db);
                        return $gallery->getAllGalleries();
                    }
                ],
            ],
        ]);
    }
}

