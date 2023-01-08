<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Vocabulary;

class VocabularyFactory extends Factory
{

    protected $model = Vocabulary::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence()
        ];
    }
}
