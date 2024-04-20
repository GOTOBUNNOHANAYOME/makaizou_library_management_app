<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailSendHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'mail_send_id',
        'user_id',
    ];

    public function mailSend()
    {
        return $this->belongsTo(MailSend::class);
    }
}
