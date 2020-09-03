<?php
namespace App\GraphQL\Queries;

use App\Comment;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class CommentsQuery extends Query
{
    protected $attributes = [
        'name' => 'comment',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Comment'));
    }

    public function resolve($root, $args)
    {
        return Comment::all();
    }
}
