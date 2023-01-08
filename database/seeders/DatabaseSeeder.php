<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\Admin\VocabularyCategorySeeder;
use Database\Seeders\Admin\VocabulariesSeeder;
use Database\Seeders\Admin\BlogCategorySeeder;
use Database\Seeders\Admin\CommentSeeder;
use Database\Seeders\Admin\BlogSeeder;
use Database\Seeders\Admin\EventNoteSeeder;
use Database\Seeders\Admin\EventSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
       return $this->call([
           UserSeeder::class,
           VocabulariesSeeder::class,
           VocabularyCategorySeeder::class,
           BlogCategorySeeder::class,
           BlogSeeder::class,
           CommentSeeder::class,
           EventSeeder::class,
           EventNoteSeeder::class,
           CourseSeeder::class,
        //    CourseNotesSeeder::class,
        //    ChapterSeeder::class,
       ]);
    }
}
