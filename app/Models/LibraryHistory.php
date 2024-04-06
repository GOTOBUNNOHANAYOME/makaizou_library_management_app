<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "library_id",
        "expired_at",
        "is_enable",
    ];

    public function library()
    {
        return $this->belongsTo(Library::class);
    }
}
