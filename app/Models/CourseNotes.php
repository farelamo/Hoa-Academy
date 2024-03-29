<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseNotes extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'user_id', 'last_chapter', 'total_chapter', 'finished'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
