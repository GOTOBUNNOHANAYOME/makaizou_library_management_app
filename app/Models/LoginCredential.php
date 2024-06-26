<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginCredential extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        'login_token',
        'agent',
        'ip',
    ];
}
