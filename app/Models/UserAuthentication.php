<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAuthentication extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'authentication_token',
        'type',
        'status', 
        'expired_at'
    ];
}
