<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'external_message_id',
        'dialog_id',
        'message_text',
        'send_at',
    ];
}
