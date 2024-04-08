<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'library_id',
        'library_history_id',
        'comment',
        'score',
    ];
}
