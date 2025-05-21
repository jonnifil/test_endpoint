<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

Route::post('set-message', [MessageController::class, 'setMessage']);
