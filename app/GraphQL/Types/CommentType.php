<?php
namespace App\GraphQL\Types;

use App\Comment;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CommentType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Comment',
        'description' => '',
        'model' => Comment::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => '',
            ],
            'body' => [
                'type' => Type::nonNull(Type::string()),
                'description' => '',
            ],
            'author' => [
                'type' => Type::nonNull(Type::string()),
                'description' => '',
            ],
            'created_at' => [
                'type' => Type::nonNull(Type::string()),
                'description' => '',
            ],
            'updated_at' => [
                'type' => Type::nonNull(Type::string()),
                'description' => '',
            ],
        ];
    }
}
