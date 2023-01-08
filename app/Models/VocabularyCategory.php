<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VocabularyCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // public function vocabularies()
    // {
    //     return $this->belongsToMany(Vocabulary::class, 'vocabulary_fields')
    //                 ->withPivot(
    //                     'vocabulary_id',
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
