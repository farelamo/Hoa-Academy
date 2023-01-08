<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Chapter;

class ChapterFactory extends Factory
{
    protected $model = Chapter::class;

    public function definition()
    {
        return [
            'course_id'    => rand(1,5),
            'ordinal'      => rand(1,5),
            'title'        => $this->faker->text($maxNbChars = 50),
            'short_desc'   => $this->faker->text($maxNbChars = 150),
            'content'      => $this->faker->text($maxNbChars = 2000),
        ];
    }
}
