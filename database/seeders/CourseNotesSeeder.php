<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CourseNotes;

class CourseNotesSeeder extends Seeder
{
    public function run()
    {
        CourseNotes::factory()->count(10)->create();
    }
}
