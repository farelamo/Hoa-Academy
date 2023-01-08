<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VocabularyField extends Model
{
    use HasFactory;

    protected $fillable = [
        'vocabulary_id', 'vocabulary_category_id',
        'word', 'vocal', 'mean', 'sound',
    ];

    public function vocabularies()
    {
        return $this->belongsTo(Vocabulary::class, 'vocabulary_id');
    }

    public function vocabulary_categories()
    {
        return $this->belongsTo(VocabularyCategory::class, 'vocabulary_category_id');
    }
}
