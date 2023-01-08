<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VocabularyCategory;

class VocabularyCategorySeeder extends Seeder
{
    public function run()
    {
        VocabularyCategory::factory()->count(5)->create();
    }
}
