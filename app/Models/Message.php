<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $external_message_id
 * @property string $message_text
 * @property integer $dialog_id
 * @property integer $send_at
 */
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
