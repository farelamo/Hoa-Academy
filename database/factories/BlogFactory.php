<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Blog;

class BlogFactory extends Factory
{
    protected $model = Blog::class;

    public function definition()
    {
        return [
            'user_id'           => rand(1,2),
            'blog_category_id'  => rand(1,5),
            'likes'             => rand(1,500),
            'title'             => $this->faker->text($maxNbChars = 50),
            'short_desc'        => $this->faker->text($maxNbChars = 80),
            'desc'              => $this->faker->text($maxNbChars = 2000),
        ];
    }
}
