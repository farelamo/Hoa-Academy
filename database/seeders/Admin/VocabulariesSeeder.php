<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vocabulary;

class VocabulariesSeeder extends Seeder
{
    public function run()
    {
        Vocabulary::factory()->count(5)->create();
    }
}
