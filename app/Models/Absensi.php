<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = ['created_by', 'course_id', 'code', 'date', 'time'];

    public function users(){
        return $this->belongsToMany(User::class, 'absensi_notes', 'absensi_id', 'user_id')
                    ->withPivot('absensi_id', 'user_id')
                    ->withTimestamps();
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
