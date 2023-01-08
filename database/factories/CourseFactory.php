<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        return [
            'title'             => $this->faker->text($maxNbChars = 50),
            'short_desc'        => $this->faker->text($maxNbChars = 150),
            'desc'              => $this->faker->text($maxNbChars = 2000),
            'type'              => rand(1,2),
            'hsk_type'          => rand(1,6),
            'business_type'     => rand(1,3),
            'level'             => rand(1,5),
            'meet_times'        => rand(8, 16),
            'duration'          => rand(8, 10),
            'price'             => rand(0, 499000),
            'group_link'        => 'www.' . $this->faker->text($maxNbChars = 5) . 'com',
            'meet_link'        => 'www.' . $this->faker->text($maxNbChars = 5) . 'com',
        ];
    }
}
