<?php

namespace App\GraphQL\Queries;

use App\Comment;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class CommentQuery extends Query
{
    protected $attributes = [
        'name' => 'Comment',
    ];

    public function type(): Type
    {
        return GraphQL::type('Comment');
    }

    public function args():array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args)
    {
        return Comment::findOrFail($args['id']);
    }
}
