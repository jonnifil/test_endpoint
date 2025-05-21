<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
{
    /**
     *
     */
    public function rules(): array
    {
        return [
            'external_client_id' => 'required|string|max:16',
            'external_message_id' => 'required|string|max:16',
            'message_text' => 'required|string|max:4096',
            'send_at' => 'required|integer',
            'client_phone' => 'required|string|regex:/^\+7\d{10}$/',
        ];
    }
}
