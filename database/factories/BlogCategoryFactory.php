<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BlogCategory;

class BlogCategoryFactory extends Factory
{
    protected $model = BlogCategory::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word()
        ];
    }
}
