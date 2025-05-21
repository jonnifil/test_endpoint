<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Services\MessageService;
use Illuminate\Http\Response;

class MessageController extends Controller
{
    /**
     * @param MessageRequest $request
     * @param MessageService $service
     * @return Response
     */
    public function setMessage(MessageRequest $request, MessageService $service): Response
    {
        $result = $service->sendMessage($request->validated());

        if ($result) {
            return response()->noContent(200);
        }

        return response()->noContent(400);
    }
}
