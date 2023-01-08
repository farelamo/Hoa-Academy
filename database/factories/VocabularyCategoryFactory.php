<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\VocabularyCategory;

class VocabularyCategoryFactory extends Factory
{
    protected $model = VocabularyCategory::class;
    
    public function definition()
    {
        return [
            'name' => $this->faker->sentence()
        ];
    }
}
