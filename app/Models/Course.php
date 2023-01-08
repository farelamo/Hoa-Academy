<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'image', 'short_desc', 'desc',
        'type', 'hsk_type', 'business_type', 'level',
        'meet_times', 'duration', 'price', 'group_link', 
        'meet_link'
    ];

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_notes')->withPivot(
            'course_id', 'user_id', 'last_chapter', 'total_chapter', 'finished'
        )->withTimestamps();
    }

    public function payment_history(){
        return $this->belongsToMany(User::class, 'payment_history', 'course_id', 'user_id')
                    ->withPivot('course_id', 'user_id', 'total_paid', 'success')
                    ->withTimestamps();
    }
}
