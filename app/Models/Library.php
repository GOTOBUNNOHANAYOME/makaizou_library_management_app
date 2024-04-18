<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'api_id',
        'isbn_10',
        'isbn_13',
        'description',
        'page',
        'thumbnail_path',
        'icon_path',
        'country',
        'publisher',
        'published_at'
    ];
}
