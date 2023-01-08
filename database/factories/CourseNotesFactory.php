<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CourseNotes;

class CourseNotesFactory extends Factory
{
    protected $model = CourseNotes::class;

    public function definition()
    {
        return [
            'course_id'     => rand(1,5),
            'user_id'       => rand(1,3),
            'last_chapter'  => rand(1,5),
            'total_chapter' => 5,
            'finished'      => false,
        ];
    }
}
