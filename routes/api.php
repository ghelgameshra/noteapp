<?php

use App\Http\Controllers\Note\NoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/notes', [NoteController::class, 'get']);
Route::get('/notes/{id}', [NoteController::class, 'show']);
