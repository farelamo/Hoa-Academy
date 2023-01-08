<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name','email','password', 'age', 'address', 'birth_date', 'picture',
        'profession', 'mandarin_level', 'poin', 'role', 'gender', 
    ];

    protected $hidden = ['password'];

    public function events(){
        return $this->belongsToMany(Event::class, 'event_notes')->withPivot('event_id', 'user_id')->withTimestamps();
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_notes')->withPivot(
            'course_id', 'user_id', 'last_chapter', 'total_chapter', 'finished'
        )->withTimestamps();
    }

}