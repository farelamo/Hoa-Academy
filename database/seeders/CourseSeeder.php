<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Chapter;
use App\Models\CourseNotes;

class CourseSeeder extends Seeder
{
    public function run()
    {
        Course::factory()->count(10)->create()->each(function ($course){
            $chapters = Chapter::factory()->count(8)->create();
            $course->chapters()->saveMany($chapters);

            // $course_notes = Chapter::factory()->count(10)->create();
            // $course->users()->saveMany($course_notes);
        });
    }
}
