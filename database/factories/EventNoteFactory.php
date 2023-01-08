<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\EventNote;

class EventNoteFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id'  => rand(1, 2), 
            'event_id' => rand(1, 5),
        ];
    }
}
