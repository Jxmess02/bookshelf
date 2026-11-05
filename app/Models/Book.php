<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    
    protected $fillable = [
        'title',
        'author',
        'genre',
        'cover',
        'publisher_id'
    ];

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }
}
