<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'short_desc', 'desc',
        'date', 'start', 'end', 'image',
        'max', 'type', 'meet_type', 'link',
        'location',
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'event_notes')->withPivot('event_id', 'user_id')->withTimestamps();
    }
}
