<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Comment;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'comment' => $this->faker->sentence(),
            'blog_id' => rand(1,15),
            'user_id' => 2,
        ];
    }
}
