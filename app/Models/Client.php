<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $external_client_id
 * @property string $client_phone
 */
class Client extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'external_client_id',
        'client_phone',
    ];
}
