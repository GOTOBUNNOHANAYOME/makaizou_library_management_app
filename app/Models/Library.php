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

    public function libraryAuthors()
    {
        return $this->hasMany(LibraryAuthor::class);
    }

    public function libraryHistories()
    {
        return $this->hasMany(LibraryHistory::class);
    }

    public function libraryReviews()
    {
        return $this->hasMany(LibraryReview::class);
    }
}
