<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EventNote;

class EventNoteSeeder extends Seeder
{
    public function run()
    {
        EventNote::factory()->count(5)->create();
    }
}
