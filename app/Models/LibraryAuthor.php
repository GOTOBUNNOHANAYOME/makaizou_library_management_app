<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryAuthor extends Model
{
    use HasFactory;

    protected $fillable = [
        'library_id',
        'name'
    ];

    public function library()
    {
        return $this->belongsTo(Library::class);
    }
}
