<?php
namespace App\GraphQL\Types;

use App\Comment;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CommentType extends GraphQLType //schemat interfejsu API
{
    protected $attributes = [//określenie atrybutu
        'name' => 'Comment',
        'description' => 'informacje o komentarzach',
        'model' => Comment::class
    ];

    public function fields(): array//określenie zwracanych zmiennych do tabeli
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'id komentarza',
            ],
            'body' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'komentarz',
            ],
            'author' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'autor komentarza',
            ],
            'created_at' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'data utworzenia',
            ],
            'updated_at' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'data aktualizacji',
            ],
        ];
    }
}
