<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // public function vocabulary_categories()
    // {
    //     return $this->belongsToMany(VocabularyCategory::class, 'vocabulary_fields')
    //                 ->withPivot(
    //                     'vocabulary_category_id',
    //                     'word',
    //                     'vocal',
    //                     'mean',
    //                     'sound'
    //                 )
    //                 ->withTimestamps();
    // }

    public function vocabulary_fields()
    {
        return $this->hasMany(VocabularyField::class);
    }
}
