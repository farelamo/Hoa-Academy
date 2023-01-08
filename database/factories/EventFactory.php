<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        return [
            'title'        => $this->faker->text($maxNbChars = 50),
            'short_desc'   => $this->faker->text($maxNbChars = 80),
            'desc'         => $this->faker->text($maxNbChars = 2000),
            'date'         => $this->faker->date(),
            'start'        => $this->faker->time('H:i'),
            'end'          => $this->faker->time('H:i'),
            'max'          => rand(100, 300),
            'type'         => rand(0, 1), // lomba = 0, seminar = 1
            'meet_type'    => rand(0, 1), // online = 0, offline = 1
            'link'         => 'www.zoom.com',
            'location'     => $this->faker->city(),
        ];
    }
}
