<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;

Route::post('/event', [EventsController::class, 'pageViewed']);

Route::post('/video-watched', [EventsController::class, 'videoWatched']);

// Route::post('/video-watched', function () {
//     return response()->json(['message' => 'Hello this is api test']);
// });
